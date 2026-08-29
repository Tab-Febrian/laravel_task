<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Classroom;

class ApiStudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::with('classroom')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('classroom', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->paginate(7)
            ->withQueryString();

        $classrooms = Classroom::all();

        $data = [
            'title' => 'Students',
            'students' => $students,
            'classrooms' => $classrooms,
        ];

        return response()->json([
            "message"    => "data found",
            "status"     => "Success",
            "data"       => $data
        ], 200);
    }
}