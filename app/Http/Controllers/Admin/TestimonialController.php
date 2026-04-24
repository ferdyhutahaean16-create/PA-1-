<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimoni.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|string|max:4',
            'workplace' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'testimony' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['_token']);

        // Logika Upload Foto Alumni
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $nama_foto = time() . '_alumni_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/testimoni'), $nama_foto);
            $data['photo'] = 'uploads/testimoni/' . $nama_foto;
        }

        Testimonial::create($data);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni alumni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|string|max:4',
            'workplace' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'testimony' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($testimonial->photo && File::exists(public_path($testimonial->photo))) {
                File::delete(public_path($testimonial->photo));
            }
            
            // Upload foto baru
            $file = $request->file('photo');
            $nama_foto = time() . '_alumni_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/testimoni'), $nama_foto);
            $data['photo'] = 'uploads/testimoni/' . $nama_foto;
        }

        $testimonial->update($data);
        return redirect()->route('testimoni.index')->with('success', 'Data testimoni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        // Hapus file foto fisik
        if ($testimonial->photo && File::exists(public_path($testimonial->photo))) {
            File::delete(public_path($testimonial->photo));
        }

        $testimonial->delete();
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus!');
    }
}