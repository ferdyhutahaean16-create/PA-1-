<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PinjamAuthController extends Controller
{
    public function showLogin()
    {
        return view('pinjam.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // API External ke cis
        $apiUrl = env('EXTERNAL_API_URL', 'https://cis.del.ac.id/user/login');

        try {
            $response = Http::asForm()->post(rtrim($apiUrl, '/') . '/jwt-api/do-auth', [
                'username' => $request->username,
                'password' => $request->password,
            ]);
        } catch (\Exception $e) {
            // set response null untuk fallback
            $response = null;
        }
        // API ready
        if ($response && $response->successful()) {
            $data = $response->json();
            $token = $data['token'] ?? ($data['access_token'] ?? null);
            session(['pinjam_token' => $token]);
            $user = $data['user'] ?? $data;
            // normalize name if present
            $name = $user['name'] ?? $user['nama'] ?? $user['full_name'] ?? $user['displayName'] ?? null;
            if (!$name && is_string($user)) {
                $name = $user;
            }

            if (!$name) {
                try {
                    $baseApi = rtrim($apiUrl, '/');
                    // Mahassiwa
                    $mahaResp = null;
                    if ($token) {
                        $mahaResp = Http::withToken($token)->get($baseApi . '/library-api/mahasiswa', [
                            'username' => $request->username,
                            'status' => 'Aktif',
                        ]);
                    } else {
                        $mahaResp = Http::get($baseApi . '/library-api/mahasiswa', [
                            'username' => $request->username,
                            'status' => 'Aktif',
                        ]);
                    }
                    if ($mahaResp && $mahaResp->successful()) {
                        $j = $mahaResp->json();
                        // common shapes: {"data":[{"nama":"..."}]}, or {"nama":"..."}
                        if (is_array($j)) {
                            if (!empty($j['data']) && is_array($j['data']) && !empty($j['data'][0]['nama'])) {
                                $name = $j['data'][0]['nama'];
                            } elseif (!empty($j['nama'])) {
                                $name = $j['nama'];
                            }
                        }
                    }
                    // Alternatif pegawai
                    if (!$name) {
                        if ($token) {
                            $pegResp = Http::withToken($token)->get($baseApi . '/library-api/pegawai', [
                                'username' => $request->username,
                            ]);
                        } else {
                            $pegResp = Http::get($baseApi . '/library-api/pegawai', [
                                'username' => $request->username,
                            ]);
                        }
                        if (!empty($pegResp) && $pegResp->successful()) {
                            $pj = $pegResp->json();
                            if (is_array($pj)) {
                                if (!empty($pj['data']) && is_array($pj['data']) && !empty($pj['data'][0]['nama'])) {
                                    $name = $pj['data'][0]['nama'];
                                } elseif (!empty($pj['nama'])) {
                                    $name = $pj['nama'];
                                }
                            }
                        }
                    }
                } catch (\Exception $e) {
                    Log::warning('PinjamAuthController: name lookup via library-api failed', ['err' => $e->getMessage()]);
                }
            }

            if ($name) {
                $user['name'] = $name;
            }

            session(['pinjam_user' => $user]);
            return redirect()->intended(route('laboratorium.pinjam'));
        }

        try {
            $base = rtrim($apiUrl, '/');
            $client = new GuzzleClient([
                'base_uri' => $base,
                'cookies' => true,
                'verify' => false,
                'allow_redirects' => true,
                'timeout' => 20,
            ]);

            // 1) Ngambil token SCRF
            try {
                $get = $client->get('/user/login');
                $body = (string) $get->getBody();
                Log::debug('PinjamAuthController: GET /user/login', ['status' => $get->getStatusCode()]);
            } catch (GuzzleException $e) {
                Log::error('PinjamAuthController: GET /user/login failed', ['message' => $e->getMessage()]);
                throw $e;
            }

            $csrfToken = null;
            $csrfParam = null;
            if (preg_match('/<meta[^>]*name="csrf-token"[^>]*content="([^"]+)"/i', $body, $m)) {
                $csrfToken = $m[1];
            }
            if (preg_match('/<meta[^>]*name="csrf-param"[^>]*content="([^"]+)"/i', $body, $m2)) {
                $csrfParam = $m2[1];
            }

            $userKey = 'username';
            $passKey = 'password';
            if (preg_match('/<input[^>]*id="loginform-username"[^>]*name="([^"]+)"/i', $body, $mu)) {
                $userKey = $mu[1];
            } elseif (preg_match('/name="([^"]*username[^"]*)"/i', $body, $mu2)) {
                $userKey = $mu2[1];
            }
            if (preg_match('/<input[^>]*id="loginform-password"[^>]*name="([^"]+)"/i', $body, $mp)) {
                $passKey = $mp[1];
            } elseif (preg_match('/name="([^"]*password[^"]*)"/i', $body, $mp2)) {
                $passKey = $mp2[1];
            }

            $form = [
                $userKey => $request->username,
                $passKey => $request->password,
            ];
            if ($csrfParam && $csrfToken) {
                $form[$csrfParam] = $csrfToken;
            } elseif ($csrfToken) {
                $form['_csrf'] = $csrfToken;
            }
            if (stripos($body, 'LoginForm[rememberMe]') !== false) {
                $form['LoginForm[rememberMe]'] = 0;
            }

            try {
                $post = $client->post('/user/login', [
                    'form_params' => $form,
                    'headers' => [
                        'Referer' => $base . '/user/login',
                    ],
                ]);
                Log::debug('PinjamAuthController: POST /user/login', ['status' => $post->getStatusCode()]);
            } catch (GuzzleException $e) {
                Log::error('PinjamAuthController: POST /user/login failed', ['message' => $e->getMessage()]);
                throw $e;
            }

            $cookies = [];
            foreach ($post->getHeader('Set-Cookie') as $c) {
                $cookies[] = $c;
            }

            $finalBody = (string) $post->getBody();
            $status = $post->getStatusCode();
            if (in_array($status, [301, 302, 303, 307, 308]) && $post->hasHeader('Location')) {
                $loc = $post->getHeaderLine('Location');
                // jika lokasi relatif, buat absolute
                if (strpos($loc, 'http') !== 0) {
                    $loc = $base . (strpos($loc, '/') === 0 ? $loc : '/' . $loc);
                }
                $follow = $client->get($loc);
                $finalBody = (string) $follow->getBody();
                foreach ($follow->getHeader('Set-Cookie') as $c) {
                    $cookies[] = $c;
                }
            }

            $profileHtml = null;
            $profilePaths = ['/user/profile', '/profile', '/user'];
            foreach ($profilePaths as $p) {
                try {
                    $r = $client->get($p);
                    $content = (string) $r->getBody();
                    if (stripos($content, $request->username) !== false || stripos($content, 'logout') !== false) {
                        $profileHtml = $content;
                        break;
                    }
                } catch (GuzzleException $e) {
                    // ignore and continue
                }
            }

            $displayName = null;
            if ($profileHtml) {
                if (preg_match('/<h1[^>]*>([^<]{2,100})<\/h1>/i', $profileHtml, $nm)) {
                    $displayName = trim(html_entity_decode(strip_tags($nm[1])));
                } elseif (preg_match('/<title[^>]*>([^<]{2,100})<\/title>/i', $profileHtml, $nm2)) {
                    $displayName = trim(html_entity_decode(strip_tags($nm2[1])));
                } elseif (preg_match('/<meta[^>]*name="author"[^>]*content="([^"]+)"/i', $profileHtml, $nm3)) {
                    $displayName = trim($nm3[1]);
                }
                if (!$displayName && preg_match('/Nama[^<0-9A-Za-z]{0,10}<[^>]+>([^<]{2,100})<\/i', $profileHtml, $nm4)) {
                    $displayName = trim($nm4[1]);
                }
            }

            $authenticated = false;
            if ($profileHtml) {
                if (stripos($profileHtml, $request->username) !== false || stripos($profileHtml, 'logout') !== false) {
                    $authenticated = true;
                }
                if ($displayName) {
                    $authenticated = true;
                }
            }

            if ($authenticated) {
                $resolvedName = $displayName;
                try {
                    // mahasiswa
                    try {
                        $mresp = $client->get('/library-api/mahasiswa', [
                            'query' => ['username' => $request->username, 'status' => 'Aktif'],
                        ]);
                        $mb = (string) $mresp->getBody();
                        $mj = json_decode($mb, true);
                        if (is_array($mj)) {
                            if (!empty($mj['data'][0]['nama'])) {
                                $resolvedName = $mj['data'][0]['nama'];
                            } elseif (!empty($mj['nama'])) {
                                $resolvedName = $mj['nama'];
                            }
                        }
                    } catch (GuzzleException $e) {
                        // ignore
                    }
                    // pegawai if still not found
                    if (!$resolvedName) {
                        try {
                            $presp = $client->get('/library-api/pegawai', [
                                'query' => ['username' => $request->username],
                            ]);
                            $pb = (string) $presp->getBody();
                            $pj = json_decode($pb, true);
                            if (is_array($pj)) {
                                if (!empty($pj['data'][0]['nama'])) {
                                    $resolvedName = $pj['data'][0]['nama'];
                                } elseif (!empty($pj['nama'])) {
                                    $resolvedName = $pj['nama'];
                                }
                            }
                        } catch (GuzzleException $e) {
                            // ignore
                        }
                    }
                } catch (\Exception $e) {
                    Log::warning('PinjamAuthController: library-api lookup failed during fallback', ['err' => $e->getMessage()]);
                }

                $userArr = ['username' => $request->username, 'profile_html' => $profileHtml];
                if ($resolvedName) {
                    $userArr['name'] = $resolvedName;
                }
                session(['pinjam_cookie' => $cookies]);
                session(['pinjam_user' => $userArr]);
                session(['pinjam_token' => 'form-login']);
                Log::info('PinjamAuthController: form-fallback login succeeded, session set', ['username' => $request->username, 'displayName' => $resolvedName]);
                return redirect()->intended(route('laboratorium.pinjam'));
            }

            Log::warning('PinjamAuthController: form-fallback did not authenticate', ['username' => $request->username, 'profile_found' => (bool)$profileHtml, 'displayName' => $displayName]);
            return back()->withErrors(['credentials' => 'Login gagal: kredensial tidak dikenali oleh sistem eksternal.']);
        } catch (GuzzleException $e) {
            Log::error('PinjamAuthController fallback error', ['exception' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Gagal menghubungi server otentikasi (form fallback): ' . $e->getMessage()]);
        } catch (\Exception $e) {
            Log::error('PinjamAuthController unexpected error', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return back()->withErrors(['error' => 'Gagal menghubungi server otentikasi (form fallback): ' . $e->getMessage()]);
        }

        // jika semua gagal
        return back()->withErrors(['credentials' => 'Username atau password salah']);
    }

    public function logout()
    {
        session()->forget(['pinjam_user', 'pinjam_token']);
        return redirect()->route('pinjam.login');
    }
}
