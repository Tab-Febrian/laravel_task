<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//         $student = [
//     [
//         'no' => '1',
//         'name' => 'Ahmad Rinaldi',
//         'grade' => 'XII RPL 3',
//         'address' => 'Jl. Merdeka No. 10, Jakarta',
//         'email' => 'ahmad.rinaldi@smk.sch.id'
//     ],
//     [
//         'no' => '2',
//         'name' => 'Budi Setiawan',
//         'grade' => 'X TKR 1',
//         'address' => 'Desa Makmur, Bogor',
//         'email' => 'budi.setiawan@smk.sch.id'
//     ],
//     [
//         'no' => '3',
//         'name' => 'Dewi Lestari',
//         'grade' => 'XI AKL 2',
//         'address' => 'Jl. Pahlawan No. 25, Surabaya',
//         'email' => 'dewi.lestari@smk.sch.id'
//     ],
//     [
//         'no' => '4',
//         'name' => 'Citra Handayani',
//         'grade' => 'XII OTKP 4',
//         'address' => 'Perumahan Indah Blok C, Bekasi',
//         'email' => 'citra.handayani@smk.sch.id'
//     ],
//     [
//         'no' => '5',
//         'name' => 'Faisal Rahman',
//         'grade' => 'X TBSM 5',
//         'address' => 'Dusun Sejahtera, Malang',
//         'email' => 'faisal.rahman@smk.sch.id'
//     ],
// ];
    $student = Students::all();
    return view('student', [
            'title' => 'Student',
            'student' => $student
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
