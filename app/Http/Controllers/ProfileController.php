<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('beranda');
    }

    public function profil()
    {
        $data = [
        'nama' => 'Muhammad Febrian',
        'kelas' => 'XI PPLG 1',
        'sekolah' => 'SMK Bisa Hebat'
    ];

        return view('profil', $data, [
            'title' => 'Profil'
        ]);
        // return view('profil');
    }
}
