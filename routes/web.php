<?php

use App\Http\Controllers\Admin\JobApplicationController as AdminJobApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\User\JobApplicationController;
use App\Http\Controllers\User\JobController as UserJobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('open');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/user/tentang', [UserController::class, 'tentang'])->name('user.tentang');
    Route::get('/user/lowongan', [UserJobController::class, 'index'])->name('user.lowongan');
    Route::get('/user/mitra', [UserController::class, 'mitra'])->name('user.mitra');

    //
    Route::get('/lowongan', [UserJobController::class, 'index'])->name('lowongan');
    Route::get('/lowongan/{job}', [JobApplicationController::class, 'show'])->name('user.jobs.show');
    Route::get('/lowongan/{job}/apply', [JobApplicationController::class, 'create'])->name('user.jobs.apply');
    Route::post('/lowongan/{job}/apply', [JobApplicationController::class, 'store'])->name('user.jobs.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    // Job Management
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');          // menampilkan semua job
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create'); // form tambah
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');         // simpan job baru
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit'); // form edit
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');  // update job
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy'); // hapus job
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.detail');

    //buat kategori
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //liat user:v
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');

    //liat yang daftar
    Route::get('/applications', [AdminJobApplicationController::class, 'index'])->name('admin.applications.index');
    Route::get('/applications/{application}', [AdminJobApplicationController::class, 'show'])->name('admin.applications.show');
});
