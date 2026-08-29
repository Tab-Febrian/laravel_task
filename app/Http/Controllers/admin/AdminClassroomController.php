<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom; 

class AdminClassroomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $classrooms = Classroom::query()
        ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('students', function ($qc) use ($search) {
                        $qc->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->paginate(7)
            ->withQueryString();

        return view('admin.classroom.index', [
            'title' => 'Data Kelas',
            'classrooms' => $classrooms,
        ]);
    }

    public function create()
    {
        $title = 'Tambah Classroom';
        return view('admin.classroom.create', compact('title', 'classrooms'));
    }

    public function edit($id)
    {
        $title = 'Edit Classroom';
        $classrooms = Classroom::findOrFail($id);
        return view('admin.classroom.edit', compact('title', 'classrooms'));
    }

    /**
     * Memproses dan menyimpan data kelas baru.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:classrooms,name', // Nama kelas harus unik
            'level' => 'required|in:X,XI,XII', // Contoh validasi level/tingkat
        ]);

        // Membuat data baru
        Classroom::create($validated);

        // Redirect kembali ke halaman index dengan pesan sukses
        // Pastikan rute 'admin.classrooms.index' sudah didefinisikan di routes/web.php
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    // Metode 'create', 'edit', 'update', dan 'destroy' tidak dibuat sesuai permintaan.
}