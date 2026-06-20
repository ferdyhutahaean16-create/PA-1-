<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Activity; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    // =====================================================================
    // BAGIAN 1: FUNGSI UNTUK HALAMAN PUBLIK (PENGUNJUNG WEBSITE)
    // =====================================================================
    
    public function indexPublik()
    {
        // 1. Ambil semua data berita (urutkan dari yang terbaru)
        $newsList = News::orderBy('published_date', 'desc')->get();
        
        // 2. Ambil semua data kegiatan (urutkan dari yang terbaru)
        $activities = Activity::orderBy('execution_time', 'desc')->get();

        // 3. Kirim kedua data tersebut ke tampilan halaman publik
        return view('berita.index', compact('newsList', 'activities'));
    }

    // =====================================================================
    // FUNGSI UNTUK MEMBACA DETAIL BERITA
    // =====================================================================
    public function bacaPublik($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->increment('views');

        $recentNews = News::where('id', '!=', $id)
                          ->orderBy('published_date', 'desc')
                          ->take(5)
                          ->get();

        // Masuk ke halaman detail utama
        return view('berita.detail', compact('newsItem', 'recentNews'));
    }

    // =====================================================================
    // FUNGSI UNTUK MEMBACA DETAIL KEGIATAN (DISATUKAN KE DETAIL UTAMA)
    // =====================================================================
    public function bacaKegiatan($id)
    {
        // 1. Ambil data kegiatan aslinya
        $activity = Activity::findOrFail($id);
        
        // 2. Trik Bungkus Ulang (Mapping) agar sesuai dengan struktur objek berita
        $newsItem = new \stdClass();
        $newsItem->title = $activity->title;
        $newsItem->views = 0; // Kegiatan tidak punya views, set default ke 0
        $newsItem->published_date = $activity->execution_time; 
        $newsItem->image = $activity->image;
        
        // Gabungkan info pelaksana dan tempat langsung ke dalam konten teks secara rapi
        $infoTambahan = '';
        if (!empty($activity->executor)) {
            $infoTambahan .= '<p class="text-xs font-bold text-amber-600 uppercase tracking-wider mb-1">Pelaksana: ' . $activity->executor . '</p>';
        }
        if (!empty($activity->location)) {
            $infoTambahan .= '<p class="text-xs font-medium text-gray-500 mb-4">Lokasi: ' . $activity->location . '</p>';
        }
        
        $newsItem->content = $infoTambahan . ($activity->description ?? '');

        // 3. Ambil rujukan berita terbaru untuk sidebar kiri
        $recentNews = News::orderBy('published_date', 'desc')->take(5)->get();

        // 4. Kirim ke file view 'detail.blade.php' yang SAMA dengan berita!
        return view('berita.detail', compact('newsItem', 'recentNews'));
    }


    // =====================================================================
    // BAGIAN 2: FUNGSI UNTUK DASHBOARD ADMIN (CRUD)
    // =====================================================================

    public function index()
    {
        // Menampilkan berita dari yang paling baru
        $newsList = News::orderBy('published_date', 'desc')->get();
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'published_date' => 'required|date',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    
        $data = $request->except(['_token']);
        $data['views'] = rand(10, 100);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . '_news_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/news'), $nama_file);
            $data['image'] = 'uploads/news/' . $nama_file;
        }
    
        News::create($data);
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('admin.news.edit', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $newsItem = News::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($newsItem->image && File::exists(public_path($newsItem->image))) {
                File::delete(public_path($newsItem->image));
            }
            
            // Upload foto baru
            $file = $request->file('image');
            $nama_file = time() . '_news_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/news'), $nama_file);
            $data['image'] = 'uploads/news/' . $nama_file;
        }

        $newsItem->update($data);
        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        
        // Hapus file fisik foto
        if ($newsItem->image && File::exists(public_path($newsItem->image))) {
            File::delete(public_path($newsItem->image));
        }

        $newsItem->delete();
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
}