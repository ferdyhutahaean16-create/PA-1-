<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TenagaPendidik;
use App\Models\Pengajaran; // 1. WAJIB IMPORT MODEL PENGAJARAN
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB; // Digunakan untuk DB::transaction

class TenagaPendidikController extends Controller
{
    // 1. Menampilkan Tabel Data
    public function index()
    {
        // Menggunakan with('pengajarans') agar query lebih cepat (Eager Loading)
        $tenaga_pendidiks = TenagaPendidik::with('pengajarans')->get();
        return view('admin.tenaga_pendidik.index', compact('tenaga_pendidiks'));
    }

    // 2. Menampilkan Form Tambah Data
    public function create()
    {
        return view('admin.tenaga_pendidik.create');
    }

    // 3. Menyimpan Data Baru ke Database (Profil + Pengajaran)
    public function store(Request $request)
    {
        // Validasi Data Dosen dan Array Pengajaran sekaligus
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|unique:tenaga_pendidiks,nidn',
            'lulusan' => 'required',
            'link_scholar' => 'nullable|url',
            'jabatan' => 'required',
            'email' => 'required|email',
            'ruangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Validasi array input pengajaran dinamis
            'mata_kuliah' => 'required|array',
            'mata_kuliah.*' => 'required|string|max:255',
            'semester' => 'required|array',
            'tahun_akademik' => 'required|array',
        ]);

        $data = $request->all();
        $data['pengampu_matkul'] = '-'; // Membypas kolom lama

        // Proses Upload Foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/foto_pendidik'; 
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['foto'] = $tujuan_upload . '/' . $nama_foto;
        }

        // BUNGKUS DENGAN TRANSACTION AGAR AMAN
        DB::transaction(function () use ($data, $request) {
            // A. Simpan data Tenaga Pendidik utama
            $tenaga_pendidik = TenagaPendidik::create($data);

            // B. Ambil data array dari form dinamis
            $mataKuliah = $request->mata_kuliah;
            $semester = $request->semester;
            $tahunAkademik = $request->tahun_akademik;

            // C. Looping array untuk menyimpan setiap baris mengajar
            foreach ($mataKuliah as $key => $val) {
                Pengajaran::create([
                    'tenaga_pendidik_id' => $tenaga_pendidik->id, // Hubungkan foreign key ke ID dosen baru
                    'mata_kuliah'        => $val,
                    'semester'           => $semester[$key],
                    'tahun_akademik'     => $tahunAkademik[$key],
                ]);
            }
        });

        return redirect()->route('tenaga-pendidik.index')->with('success', 'Data Tenaga Pendidik & Pengajaran berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit
    public function edit($id)
    {
        // Cari data dosen beserta list pengajarannya sekalian
        $tenaga_pendidik = TenagaPendidik::with('pengajarans')->findOrFail($id);
        return view('admin.tenaga_pendidik.edit', compact('tenaga_pendidik'));
    }

    // 5. Menyimpan Perubahan Data (Update Profil + Pengajaran)
    public function update(Request $request, $id)
    {
        $tenaga_pendidik = TenagaPendidik::findOrFail($id);

        // Tambahkan validasi array pengajaran di form update agar aman dari manipulasi
        $request->validate([
            'nidn' => 'required|string|unique:tenaga_pendidiks,nidn,' . $id,
            'nama' => 'required',
            'lulusan' => 'required',
            'link_scholar' => 'nullable|url',
            'jabatan' => 'required',
            'email' => 'required|email',
            'no_telpon' => '|string|max:20',
            'ruangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['pengampu_matkul'] = '-';

        // Jika user upload foto baru
        if ($request->hasFile('foto')) {
            if ($tenaga_pendidik->foto && File::exists(public_path($tenaga_pendidik->foto))) {
                File::delete(public_path($tenaga_pendidik->foto));
            }

            $foto = $request->file('foto');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/foto_pendidik';
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['foto'] = $tujuan_upload . '/' . $nama_foto;
        }

        // BUNGKUS DENGAN TRANSACTION SAAT UPDATE RELASI ARRAY
        DB::transaction(function () use ($tenaga_pendidik, $data, $request) {
            // A. Update data utama dosen
            $tenaga_pendidik->update($data);

            // B. Strategi Update Array: Hapus semua data mengajar yang lama terlebih dahulu
            $tenaga_pendidik->pengajarans()->delete();

            // C. Masukkan kembali baris pengajaran baru hasil modifikasi admin
            $mataKuliah = $request->mata_kuliah;
            $semester = $request->semester;
            $tahunAkademik = $request->tahun_akademik;

            // Looping untuk menyimpan array ke database
            if (!empty($mataKuliah)) {
                foreach ($mataKuliah as $key => $matkul) {
                    // Pastikan input mata kuliah tidak kosong sebelum disimpan
                    if (!empty($matkul)) { 
                        \App\Models\Pengajaran::create([
                            'tenaga_pendidik_id' => $tenaga_pendidik->id,
                            'mata_kuliah'        => $matkul,
                            'semester'           => $semester[$key] ?? '-',
                            'tahun_akademik'     => $tahunAkademik[$key] ?? '-',
                        ]);
                    }
                }
            }
        });

        return redirect()->route('tenaga-pendidik.index')->with('success', 'Data Tenaga Pendidik & Pengajaran berhasil diperbarui!');
    }

    // 6. Menghapus Data (Otomatis menghapus pengajaran karena Cascade pada DB)
    public function destroy($id)
    {
        $tenaga_pendidik = TenagaPendidik::findOrFail($id);

        if ($tenaga_pendidik->foto && File::exists(public_path($tenaga_pendidik->foto))) {
            File::delete(public_path($tenaga_pendidik->foto));
        }

        $tenaga_pendidik->delete();

        return redirect()->route('tenaga-pendidik.index')->with('success', 'Data Tenaga Pendidik berhasil dihapus!');
    }
}