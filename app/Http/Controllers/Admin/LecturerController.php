<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Teaching; // 💡 Pastikan Anda sudah me-rename model Pengajaran menjadi Teaching
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('teachings')->get();
        return view('admin.lecturer.index', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.lecturer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'nullable|unique:lecturers,nidn',
            'education' => 'required',
            'link_scholar' => 'nullable|url',
            'position' => 'required',
            'email' => 'required|email',
            'office_room' => 'required',
            'phone_number' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            
            // Validasi array input teaching (pengajaran)
            'course_name' => 'required|array', // Sebelumnya mata_kuliah
            'course_name.*' => 'required|string|max:255',
            'semester' => 'required|array',
            'academic_year' => 'required|array',
        ]);

        $data = $request->all();
        $data['courses_taught'] = '-'; // Membypas kolom lama

        // Proses Upload Foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $upload_destination = 'uploads/lecturer_photos'; 
            $photo->move(public_path($upload_destination), $photo_name);
            $data['photo'] = $upload_destination . '/' . $photo_name;
        }

        DB::transaction(function () use ($data, $request) {
            // A. Simpan data Dosen
            $lecturer = Lecturer::create($data);

            // B. Ambil data array dari form
            $courseNames = $request->course_name;
            $semesters = $request->semester;
            $academicYears = $request->academic_year;

            // C. Looping array
            foreach ($courseNames as $key => $val) {
                Teaching::create([
                    'lecturer_id'   => $lecturer->id,
                    'course_name'   => $val,
                    'semester'      => $semesters[$key],
                    'academic_year' => $academicYears[$key],
                ]);
            }
        });

        return redirect()->route('lecturer.index')->with('success', 'Lecturer & Teaching data successfully added!');
    }

    public function edit($id)
    {
        $lecturer = Lecturer::with('teachings')->findOrFail($id);
        return view('admin.lecturer.edit', compact('lecturer'));
    }

    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'required|string|unique:lecturers,nidn,' . $id,
            'education' => 'required',
            'link_scholar' => 'nullable|url',
            'position' => 'required',
            'email' => 'required|email',
            'phone_number' => 'nullable|string|max:20',
            'office_room' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['courses_taught'] = '-';

        // Upload Foto Baru
        if ($request->hasFile('photo')) {
            if ($lecturer->photo && File::exists(public_path($lecturer->photo))) {
                File::delete(public_path($lecturer->photo));
            }

            $photo = $request->file('photo');
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $upload_destination = 'uploads/lecturer_photos';
            $photo->move(public_path($upload_destination), $photo_name);
            $data['photo'] = $upload_destination . '/' . $photo_name;
        }

        DB::transaction(function () use ($lecturer, $data, $request) {
            $lecturer->update($data);

            // Hapus data mengajar lama
            $lecturer->teachings()->delete();

            // Masukkan data baru
            $courseNames = $request->course_name;
            $semesters = $request->semester;
            $academicYears = $request->academic_year;

            if (!empty($courseNames)) {
                foreach ($courseNames as $key => $matkul) {
                    if (!empty($matkul)) { 
                        Teaching::create([
                            'lecturer_id'   => $lecturer->id,
                            'course_name'   => $matkul,
                            'semester'      => $semesters[$key] ?? '-',
                            'academic_year' => $academicYears[$key] ?? '-',
                        ]);
                    }
                }
            }
        });

        return redirect()->route('lecturer.index')->with('success', 'Lecturer & Teaching data successfully updated!');
    }

    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        if ($lecturer->photo && File::exists(public_path($lecturer->photo))) {
            File::delete(public_path($lecturer->photo));
        }

        $lecturer->delete();

        return redirect()->route('lecturer.index')->with('success', 'Lecturer data successfully deleted!');
    }
}