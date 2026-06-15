<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Penelitian;

class PrestasiController extends Controller
{
    public function index()
    {
        // Mengambil semua data prestasi, diurutkan dari tahun terbaru
        $prestasi = Prestasi::orderBy('tanggal_perolehan', 'desc')->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        // Agar nama dosen terisi
        $dosens = \App\Models\TenagaPendidik::orderBy('nama', 'asc')->get();
        return view('admin.prestasi.create', compact('dosens'));
    }

    public function store(Request $request)
{
    // (Bagian $request->validate([...]) biarkan saja tetap di sini)

    // 1. Siapkan wadah data yang bersih dan sesuai dengan phpMyAdmin
    $data = [];

    // 2. Logika Kategori Dosen / Mahasiswa
    $data['kategori'] = $request->kategori;
    if ($request->kategori == 'Dosen') {
        $dosen = \App\Models\TenagaPendidik::findOrFail($request->tenaga_pendidik_id);
        $data['nama_peraih'] = $dosen->nama;
        $data['tenaga_pendidik_id'] = $request->tenaga_pendidik_id;
    } else {
        $data['nama_peraih'] = $request->nama_peraih;
        $data['tenaga_pendidik_id'] = null;
    }

    // 3. PEMETAAN KOLOM (Mengubah bahasa Form menjadi bahasa Database)
    // Gabungkan nama kompetisi dan judulnya agar datanya utuh tersimpan
    $data['nama_prestasi'] = $request->judul_prestasi . ' (' . $request->nama_prestasi . ')';
    
    $data['tingkat'] = $request->tingkat;
    $data['penyelenggara'] = $request->penyelenggara;
    $data['tanggal_perolehan'] = $request->tanggal_perolehan;

    // 4. PEMETAAN FILE UPLOAD (Dari 'foto' menjadi 'bukti_sertifikat')
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'uploads/prestasi';
        $file->move(public_path($tujuan_upload), $nama_file);
        
        // Simpan path-nya ke kolom yang benar
        $data['bukti_sertifikat'] = $tujuan_upload . '/' . $nama_file;
        $data['nama_mahasiswa'] = $data['nama_peraih'];
    }

    // 5. Eksekusi Simpan Data
    // Catatan: Data 'deskripsi' dan 'tahun' otomatis kita abaikan dari sini 
    // karena database Anda belum memiliki kolom tersebut, sehingga tidak akan memicu eror.
    Prestasi::create($data);

    return redirect()->route('prestasi.index')->with('success', 'Sistem berhasil diselaraskan dan data prestasi berhasil ditambahkan!');
}

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:Dosen,Mahasiswa',
            'nama_peraih' => 'required|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'nullable|string|max:100',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($prestasi->foto && File::exists(public_path($prestasi->foto))) {
                File::delete(public_path($prestasi->foto));
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/prestasi';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        $prestasi->update($data);
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus file foto dari folder
        if ($prestasi->foto && File::exists(public_path($prestasi->foto))) {
            File::delete(public_path($prestasi->foto));
        }

        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil dihapus!');
    }

    public function penelitian()
    {
        // 1. Ambil data riset dari database
        $penelitians = \App\Models\Penelitian::orderBy('tahun', 'desc')->get();
        
        // 2. Kirim ke view halaman publik (sesuaikan dengan nama file blade kamu)
        return view('prestasi.penelitian', compact('penelitians')); 
    }
}