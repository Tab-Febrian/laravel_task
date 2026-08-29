<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\Subjects;
use Illuminate\Validation\Rule;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $teachers = Teachers::with('subject')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('subject', function ($qc) use ($search) {
                        $qc->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->paginate(3)
            ->withQueryString();

        $subjects = Subjects::doesntHave('teacher')->get();

        return view('admin.teacher.index', [
            'title' => 'Teacher List',
            'teacher' => $teachers,
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        $title = 'Tambah Teacher';

        // hanya subject yg belum punya teacher yg muncul
        $subjects = Subjects::doesntHave('teacher')->get();

        return view('admin.teacher.create', compact('title', 'subjects'));
    }

public function edit($id)
{
    $title = 'Edit Teacher';
    $teachers = Teachers::findOrFail($id);

    // tampilkan semua subject yg belum punya teacher + yg sekarang dipakai
    $subjects = Subjects::whereDoesntHave('teacher')
        ->orWhere('id', $teachers->subject_id)
        ->get();

    return view('admin.teacher.edit', compact('title', 'teachers', 'subjects'));
}



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'subject_id' => 'required|unique:teachers,subject_id', // 1 subject hanya 1 teacher
        ]);

        Teachers::create($validated);

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher berhasil ditambahkan!');
    }

    public function update(Request $request, Teachers $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($teacher->id)],
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'subject_id' => [
                'required',
                Rule::unique('teachers', 'subject_id')->ignore($teacher->id), 
            ],
        ]);

        $teacher->update($validated);

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher berhasil diupdate!');
    }

    public function destroy(Teachers $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher berhasil dihapus!');
    }
}
