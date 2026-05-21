<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\TenagaPendidik;

class KegiatanController extends Controller
{
    // ---------------------------------------------------------
    // 1. FUNGSI UNTUK HALAMAN ADMIN (MENAMPILKAN SEMUA DATA)
    // ---------------------------------------------------------
    public function index()
    {
        // Mengambil semua data kegiatan terbaru
        $kegiatan = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    // ---------------------------------------------------------
    // 2. FUNGSI UNTUK HALAMAN PUBLIK (KHUSUS PKM DOSEN)
    // ---------------------------------------------------------
    public function indexPublikDosen()
    {
        // PERHATIAN: Nama variabel diubah menjadi $kegiatan (tanpa 's') 
        // agar sinkron dengan dosen.blade.php
        $kegiatan = Kegiatan::where('kategori', 'Pengabdian Masyarakat (PKM) Dosen')
                          ->orderBy('waktu_pelaksanaan', 'desc')
                          ->get();

        // Kirim data ke view publik kegiatan dosen Anda
        return view('kegiatan.dosen', compact('kegiatan'));
    }

    // ---------------------------------------------------------
    // FUNGSI LAINNYA TETAP SAMA
    // ---------------------------------------------------------

    public function create()
    {
        // Ambil semua data dosen dari database, diurutkan berdasarkan nama A-Z
        $dosens = TenagaPendidik::orderBy('nama', 'asc')->get();

        // Lewatkan variabel $dosens ke dalam view menggunakan compact()
        return view('admin.kegiatan.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Dasar
        $request->validate([
            'kategori' => 'required',
            'judul' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|date',
        ]);

        // 2. Ambil seluruh input dari form
        $data = $request->all();

        // 3. Logika Pemisahan: PKM Dosen (Dropdown) VS Kegiatan Mahasiswa (Teks Bebas)
        if ($request->kategori === 'Pengabdian Masyarakat (PKM) Dosen') {

            // Cari objek dosen tunggal berdasarkan ID yang dikirim dropdown (.first())
            $dosen = \App\Models\TenagaPendidik::where('id', $request->tenaga_pendidik_id)->first();

            if ($dosen) {
                $data['pelaksana'] = $dosen->nama; // Set nama dosen ke kolom pelaksana
                $data['tenaga_pendidik_id'] = $dosen->id; // Set ID dosen ke database
            } else {
                // Antisipasi jika dosen tidak ditemukan/tidak memilih dropdown
                return redirect()->back()->withErrors(['tenaga_pendidik_id' => 'Silakan pilih Dosen Pelaksana terlebih dahulu.'])->withInput();
            }

        } else {
            // Jika kategori Kegiatan Mahasiswa atau Lainnya
            $data['pelaksana'] = $request->pelaksana_nama; // Diambil dari input teks bebas
            $data['tenaga_pendidik_id'] = null; // Set null karena bukan dosen
        }

        // 4. Proses Upload Foto (Sesuai baris kode 48-64 di file lama kamu)
        if ($request->hasFile('foto')) {
            $tujuan_upload = 'uploads/kegiatan';
            $file = $request->file('foto');
            // Gunakan nama file unik
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        // 5. Eksekusi Simpan ke Database
        \App\Models\Kegiatan::create($data);

        // 6. Redirect dengan pesan sukses
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $dosens = TenagaPendidik::orderBy('nama', 'asc')->get(); // Tambahkan ini juga di fungsi edit

        return view('admin.kegiatan.edit', compact('kegiatan', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // PERBAIKAN VALIDASI: Menyesuaikan dengan logika pemisahan pelaksana seperti di fungsi store()
        $request->validate([
            'kategori' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|date', // Diganti menjadi date agar sesuai kalender
            'tempat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // 3. Logika Pemisahan untuk UPDATE
        if ($request->kategori === 'Pengabdian Masyarakat (PKM) Dosen') {
            $dosen = \App\Models\TenagaPendidik::where('id', $request->tenaga_pendidik_id)->first();
            
            if ($dosen) {
                $data['pelaksana'] = $dosen->nama;
                $data['tenaga_pendidik_id'] = $dosen->id;
            }
        } else {
            $data['pelaksana'] = $request->pelaksana_nama;
            $data['tenaga_pendidik_id'] = null;
        }

        // Proses Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
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

        // Hapus file foto dari folder
        if ($kegiatan->foto && File::exists(public_path($kegiatan->foto))) {
            File::delete(public_path($kegiatan->foto));
        }

        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus!');
    }
}