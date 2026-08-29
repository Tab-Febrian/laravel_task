<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function kontak()
    {
        return view('kontak', [
            'title' => 'Kontak'
        ]);
    }

    public function adminIndex()
    {
        return view('components.admin.kontak', [
            'title' => 'Kontak Admin',
            'email' => 'febianfebian323@gmail.com',
            'instagram' => '@lekerawr',
            'whatsapp' => '+62 819-9185-2191'
        ]);
    }
}
