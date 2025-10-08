<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function teacher()
    {
        $teacher = Teachers::all();
        return view('teacher', [
            'title' => 'Teacher',
            'teacher' => $teacher
        ]);
    }
}
