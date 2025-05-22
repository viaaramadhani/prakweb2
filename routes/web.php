<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Halaman awal
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Auth
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');


    // Students
    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');
    Route::get('/students/{id}', [StudentController::class, 'show'])
        ->name('students.show');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])
        ->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])
        ->name('students.destroy');
    Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
    Route::get('/majors/create', [MajorController::class, 'create'])->name('majors.create');
    Route::post('/majors', [MajorController::class, 'store'])->name('majors.store');
    Route::get('/majors/{major}', [MajorController::class, 'show'])->name('majors.show');
    Route::get('/majors/{major}/edit', [MajorController::class, 'edit'])->name('majors.edit');
    Route::put('/majors/{major}', [MajorController::class, 'update'])->name('majors.update');
    Route::delete('/majors/{major}', [MajorController::class, 'destroy'])->name('majors.destroy');

});