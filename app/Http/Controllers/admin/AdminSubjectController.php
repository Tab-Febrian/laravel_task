<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\Teachers;

class AdminSubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $subjects = Subjects::with('teacher')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('teacher', function ($qc) use ($search) {
                        $qc->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->paginate(7)
            ->withQueryString();

        $teachers = Teachers::all();

        return view('admin.subject.index', [
            'title' => 'Data Mata Pelajaran',
            'subjects' => $subjects,
            'teachers' => $teachers,
        ]);
    }

    public function edit($id)
    {
        $subject = Subjects::with('teacher')->findOrFail($id);
        $teachers = Teachers::all();
        $title = 'Edit Subject';

        return view('admin.subject.edit', compact('title', 'subject', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:subjects,name',
            'description' => 'nullable|string',
        ]);

        Subjects::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.subject.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $subject = Subjects::findOrFail($id);
        $subject->update([
            'name'       => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.subject.index')->with('success', 'Mata pelajaran berhasil diubah!');
    }

    public function destroy(Subjects $subject)
    {
        $subject->delete();
        return redirect()->route('admin.subject.index')->with('success', 'Subject berhasil dihapus!');
    }
}