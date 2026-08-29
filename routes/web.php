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
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminTeacherController;
use App\Http\Controllers\admin\AdminGuardianController;
use App\Http\Controllers\admin\AdminSubjectController;
use App\Http\Controllers\admin\AdminClassroomController;

// Rute untuk Halaman Utama
// Route::get('/home', function () {
//     return view('home', [
//         'title' => 'Home'
//     ]);
// })->name('home');

// Rute untuk Halaman Beranda (jika diperlukan)
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/beranda', [ProfileController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfileController::class, 'profil'])->name('profil');
Route::get('/kontak', [ContactController::class, 'kontak'])->name('kontak');
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/guardian', [GuardianController::class, 'guardian'])->name('guardian');
Route::get('/classroom', [ClassroomController::class, 'classroom'])->name('classroom');
Route::get('/teacher', [TeacherController::class, 'teacher'])->name('teacher');
Route::get('/subject', [SubjectController::class, 'subject'])->name('subject');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== ROUTE UNTUK ADMIN PANEL =====
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])
        ->name('admin.dashboard');
    Route::resource('student', AdminStudentController::class)->except(['show']);
    Route::resource('teacher', AdminTeacherController::class)->except(['show']);
    Route::resource('guardian', AdminGuardianController::class)->except(['show']);
    Route::resource('subject', AdminSubjectController::class)->except(['show']);
    Route::resource('classroom', AdminClassroomController::class)->except(['show']);
});