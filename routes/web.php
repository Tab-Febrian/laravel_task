<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });php

// Route::get('/', function () {
//     return view('beranda');
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;

// Rute untuk Halaman Utama
// Route::get('/home', function () {
//     return view('home', [
//         'title' => 'Home'
//     ]);
// })->name('home');

Route::get('/', [HomeController::class, 'home'])->name('home');

// Rute untuk Halaman Beranda (jika diperlukan)
Route::get('/beranda', [ProfileController::class, 'index'])->name('beranda');

// Rute untuk Halaman Profil
Route::get('/profil', [ProfileController::class, 'profil'])->name('profil');

// Rute untuk Halaman Kontak
Route::get('/kontak', [ContactController::class, 'kontak'])->name('kontak');

// Rute untuk Halaman Student
Route::get('/student', [StudentController::class, 'index'])->name('student');

Route::get('/guardian', [GuardianController::class, 'guardian'])->name('guardian');

Route::get('/classroom', [ClassroomController::class, 'classroom'])->name('classroom');