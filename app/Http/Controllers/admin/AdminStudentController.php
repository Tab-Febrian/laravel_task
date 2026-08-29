<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Classroom;
use Illuminate\Validation\Rule;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Students::with('classroom')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('classroom', function ($qc) use ($search) {
                        $qc->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->paginate(7)
            ->withQueryString();

        $classrooms = Classroom::all();

        return view('admin.student.index', [
            'title' => 'Students',
            'students' => $students,
            'classrooms' => $classrooms
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Students::create($validated);

        return redirect()->route('admin.student.index')
            ->with('success', 'Student berhasil ditambahkan!');
    }

    public function update(Request $request, Students $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id)
            ],
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($validated);

        return redirect()->route('admin.student.index')
            ->with('success', 'Student berhasil diupdate!');
    }

    public function destroy(Students $student)
    {
        $student->delete();

        return redirect()->route('admin.student.index')
            ->with('success', 'Student berhasil dihapus!');
    }
}
