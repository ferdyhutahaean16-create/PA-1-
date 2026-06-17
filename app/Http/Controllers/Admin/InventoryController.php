<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory; // Model baru (Inventory)
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // Ambil semua data
        $inventories = Inventory::orderBy('created_at', 'desc')->get();

        // LOGIKA CERDAS: Mengelompokkan berdasarkan kategori Inggris yang baru
        $equipment = $inventories->where('category', 'Equipment');
        $materials = $inventories->where('category', 'Material');
        $instruments = $inventories->where('category', 'Instrument');

        // Kirim ketiga kelompok data tersebut ke View
        return view('admin.inventories.index', compact('equipment', 'materials', 'instruments'));
    }

    public function create()
    {
        return view('admin.inventories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category'  => 'required|in:Equipment,Material,Instrument',
            'item_name' => 'required|string|max:255',
        ]);

        $data = $request->all();
        
        // 💡 CEGAHAN ERROR 1048: Jika jumlah dikosongkan (null), paksa menjadi angka 0
        $data['quantity'] = $request->quantity ?? 0;

        Inventory::create($data);

        return redirect()->route('inventories.index')->with('success', 'Data inventaris lab berhasil ditambahkan secara utuh!');
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $inventory = Inventory::findOrFail($id);
        
        // Eksekusi perintah hapus
        $inventory->delete();

        return redirect()->back()->with('success', 'Data inventaris berhasil dihapus dari sistem!');
    }

    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('admin.inventories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category'  => 'required|in:Equipment,Material,Instrument',
            'item_name' => 'required|string|max:255',
        ]);

        $item = Inventory::findOrFail($id);
        $data = $request->all();

        $data['quantity'] = $request->quantity ?? 0;

        if ($data['category'] !== 'Material') {
            $data['expiry_date'] = null;
            $data['chemical_formula'] = null;
            $data['cupboard_location'] = null;
            $data['lab_location'] = null;
            $data['gross_weight'] = null;
            $data['net_weight'] = null;
        }

        if ($data['category'] !== 'Equipment') {
            $data['year'] = null;
            $data['storage'] = null;
        }

        if ($data['category'] !== 'Instrument') {
            $data['item_code'] = null;
            $data['unit'] = null;
            $data['price'] = null;
        }

        // Simpan semua pembaruan secara otomatis
        $item->update($data);

        return redirect()->route('inventories.index')->with('success', 'Data inventaris berhasil diperbarui dengan akurat!');
    }
}