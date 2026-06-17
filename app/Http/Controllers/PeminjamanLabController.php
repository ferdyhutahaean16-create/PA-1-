<?php

namespace App\Http\Controllers;

// 💡 Mengimpor Model Bahasa Inggris yang baru
use App\Models\LabLoan;
use App\Models\EquipmentLoanDetail;
use App\Models\MaterialLoanDetail;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanLabController extends Controller 
{
    public function formPinjam()
    {
        $inventaris = Inventory::where('quantity', '>', 0)->orderBy('item_name', 'asc')->get();

        $pu = session('pinjam_user');
        
        $nama = $pu['nama'] ?? 'Mahasiswa IT Del';
        $identitas = $pu['nim'] ?? $pu['username'] ?? ''; 
        $prodi = $pu['prodi'] ?? $pu['unit'] ?? 'Bioteknologi'; 

        $alat = $inventaris->where('category', 'Equipment');
        $bahan = $inventaris->where('category', 'Material');
        $instrumen = $inventaris->where('category', 'Instrument');

        return view('laboratorium.pinjam', compact(
            'nama', 'identitas', 'prodi', 'inventaris', 'alat', 'bahan', 'instrumen'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string',
            'nim' => 'required|string',
            'ruang_lab' => 'required|string',
            'rencana_pinjam' => 'required|date',
            'rencana_kembali' => 'required|date|after_or_equal:rencana_pinjam',
            'barang_id' => 'required|array', 
            'jumlah_pinjam' => 'required|array'
        ], [
            'barang_id.required' => 'Keranjang peminjaman kosong! Silakan pilih barang terlebih dahulu.'
        ]);

        DB::transaction(function () use ($request) {
            
            // A. Simpan data utama formulir (Mapping ID ke EN)
            $peminjaman = LabLoan::create([
                'service_type' => $request->tipe_layanan,
                'loan_category' => $request->kategori_peminjaman,
                'borrower_name' => $request->nama_peminjam,
                'nim_nik' => $request->nim,
                'study_program' => $request->program_studi,
                'destination_lab' => $request->ruang_lab,
                'research_title' => $request->judul_penelitian,
                'planned_borrow_date' => $request->rencana_pinjam,
                'planned_return_date' => $request->rencana_kembali,
                'status' => 'Pending' 
            ]);

            // B. Looping untuk menyimpan detail barang dan MENGURANGI STOK
            foreach ($request->barang_id as $index => $id_barang) {
                $qty_pinjam = $request->jumlah_pinjam[$index];
                $barang = Inventory::find($id_barang);

                if ($barang) {
                    if ($request->kategori_peminjaman === 'Bahan') {
                        MaterialLoanDetail::create([
                            'lab_loan_id' => $peminjaman->id,
                            'inventory_id' => $id_barang,
                            'material_name' => $barang->item_name,
                            'quantity' => $qty_pinjam
                        ]);
                    } else {
                        EquipmentLoanDetail::create([
                            'lab_loan_id' => $peminjaman->id,
                            'inventory_id' => $id_barang,
                            'equipment_name' => $barang->item_name,
                            'quantity' => $qty_pinjam
                        ]);
                    }

                    $barang->quantity -= $qty_pinjam;
                    $barang->save();
                }
            }
        });

        return redirect()->back()->with('success', 'Formulir berhasil dikirim dan stok laboratorium telah disesuaikan otomatis!');
    }

    public function indexAdmin() {
        // 💡 Memanggil relasi baru: equipmentDetails dan materialDetails
        $peminjamans = LabLoan::with(['equipmentDetails', 'materialDetails'])->orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function cekStatus(Request $request) {
        $nim = $request->query('nim');
        $peminjamans = $nim ? LabLoan::where('nim_nik', $nim)->orderBy('created_at', 'desc')->get() : collect();
        return view('laboratorium.cek_status', compact('peminjamans', 'nim'));
    }

    public function updateStatus(Request $request, $id)
    {
        // 💡 Validasi menyesuaikan status bahasa Inggris
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected,Completed',
            'catatan_admin' => 'nullable|string'
        ]);

        $peminjaman = LabLoan::with(['equipmentDetails', 'materialDetails'])->findOrFail($id);
        
        // LOGIKA PEMULIHAN STOK OTOMATIS
        if (in_array($request->status, ['Rejected', 'Completed']) && !in_array($peminjaman->status, ['Rejected', 'Completed'])) {
            
            // 1. Pulihkan Stok Alat
            foreach ($peminjaman->equipmentDetails as $detail) {
                $barang = Inventory::find($detail->inventory_id);
                if ($barang) {
                    $barang->quantity += $detail->quantity;
                    $barang->save();
                }
            }

            // 2. Pulihkan Stok Bahan
            foreach ($peminjaman->materialDetails as $detail) {
                $barang = Inventory::find($detail->inventory_id);
                if ($barang) {
                    $barang->quantity += $detail->quantity;
                    $barang->save();
                }
            }
        }

        $peminjaman->status = $request->status;
        $peminjaman->admin_notes = $request->catatan_admin;
        if ($request->status === 'Completed') {
            $peminjaman->returned_date = now();
        }
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui dan stok disesuaikan!');
    }

    public function cetakBon($id)
    {
        $peminjaman = LabLoan::with(['equipmentDetails', 'materialDetails'])->findOrFail($id);
        return view('admin.peminjaman.cetak', compact('peminjaman'));
    }
}