<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardians;
use Illuminate\Validation\Rule;

class AdminGuardianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $guardian = Guardians::query()
        ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('job', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(7)
            ->withQueryString();

        return view('admin.guardian.index', [
            'title' => 'Guardian List',
            'guardian' => $guardian
        ]);
    }

    public function create()
    {
        $title = 'Tambah Guardian';
        return view('admin.guardian.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit Guardian';
        $guardian = Guardians::findOrFail($id);
        return view('admin.guardian.edit', compact('title', 'guardian'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => 'required|email|unique:guardians,email',
            'phone' => 'required|string|max:20', 
            'address' => 'required|string|max:255',
        ]);

        Guardians::create($validated);

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian added successfully!');
    }

    public function update(Request $request, Guardians $guardian)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('guardians', 'email')->ignore($guardian->id)],
            'phone' => 'required|string|max:20', 
            'address' => 'required|string|max:255',
        ]);

        $guardian->update($validated);

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian updated successfully!');
    }

    public function destroy(Guardians $guardian)
    {
        $guardian->delete();
        return redirect()->route('admin.guardian.index')->with('success', 'Guardian deleted successfully!');
    }
}