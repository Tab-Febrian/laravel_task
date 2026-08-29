<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Home'
        ]);
    }

    public function adminDashboard()
    {
        return view('components.admin.dashboard', [
            'title' => 'Dashboard Admin'
        ]);
    }
}
