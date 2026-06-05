<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\TenagaPendidik;
use Illuminate\Support\Str; // Tambahan wajib untuk fitur pencarian teks pintar

class KegiatanController extends Controller
{
    // ---------------------------------------------------------
    // 1. FUNGSI UNTUK HALAMAN ADMIN
    // ---------------------------------------------------------
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    // ---------------------------------------------------------
    // 2. FUNGSI UNTUK HALAMAN PUBLIK (KHUSUS PKM DOSEN)
    // ---------------------------------------------------------
    public function indexPublikDosen()
    {
        
        $kegiatan = Kegiatan::whereNotNull('tenaga_pendidik_id')
                          ->orWhereRaw('LOWER(kategori) LIKE ?', ['%pengabdian%'])
                          ->orWhereRaw('LOWER(kategori) LIKE ?', ['%dosen%'])
                          ->orderBy('waktu_pelaksanaan', 'desc')
                          ->get();

        return view('kegiatan.dosen', compact('kegiatan'));
    }

    public function create()
    {
        $dosens = TenagaPendidik::orderBy('nama', 'asc')->get();
        return view('admin.kegiatan.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'judul' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|date',
        ]);

        $data = $request->all();

        // 🚨 PERBAIKAN LOGIKA: Cerdas mendeteksi kata "Pengabdian" tanpa peduli huruf besar/kecil
        if (Str::contains(strtolower($request->kategori), 'pengabdian') || Str::contains(strtolower($request->kategori), 'dosen')) {
            $dosen = TenagaPendidik::where('id', $request->tenaga_pendidik_id)->first();
            
            if ($dosen) {
                $data['pelaksana'] = $dosen->nama;
                $data['tenaga_pendidik_id'] = $dosen->id;
            } else {
                return redirect()->back()->withErrors(['tenaga_pendidik_id' => 'Silakan pilih Dosen Pelaksana terlebih dahulu.'])->withInput();
            }
        } else {
            $data['pelaksana'] = $request->pelaksana_nama ?? $request->pelaksana;
            $data['tenaga_pendidik_id'] = null;
        }

        if ($request->hasFile('foto')) {
            $tujuan_upload = 'uploads/kegiatan';
            $file = $request->file('foto');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        Kegiatan::create($data);
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $dosens = TenagaPendidik::orderBy('nama', 'asc')->get();

        return view('admin.kegiatan.edit', compact('kegiatan', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'kategori' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|date',
            'tempat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // 🚨 PERBAIKAN LOGIKA: Cerdas mendeteksi kata "Pengabdian" (Sama seperti fungsi store)
        if (Str::contains(strtolower($request->kategori), 'pengabdian') || Str::contains(strtolower($request->kategori), 'dosen')) {
            $dosen = TenagaPendidik::where('id', $request->tenaga_pendidik_id)->first();
            
            if ($dosen) {
                $data['pelaksana'] = $dosen->nama;
                $data['tenaga_pendidik_id'] = $dosen->id;
            }
        } else {
            $data['pelaksana'] = $request->pelaksana;
            $data['tenaga_pendidik_id'] = null;
        }

        if ($request->hasFile('foto')) {
            if ($kegiatan->foto && File::exists(public_path($kegiatan->foto))) {
                File::delete(public_path($kegiatan->foto));
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/kegiatan';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        $kegiatan->update($data);
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->foto && File::exists(public_path($kegiatan->foto))) {
            File::delete(public_path($kegiatan->foto));
        }

        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus!');
    }
}