<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\AnggotaDewanController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes untuk Pimpinan
Route::middleware([RoleMiddleware::class . ':pimpinan'])->group(function () {
    Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan.dashboard');
});

// Routes untuk Bendahara
Route::middleware([RoleMiddleware::class . ':bendahara'])->group(function () {
    Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara.dashboard');
});

// Routes untuk Anggota Dewan
Route::middleware([RoleMiddleware::class . ':anggota dewan'])->group(function () {
    Route::get('/anggota-dewan', [AnggotaDewanController::class, 'index'])->name('anggota.dewan.dashboard');
});

// Routes untuk Staff
Route::middleware([RoleMiddleware::class . ':staff'])->group(function () {
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.dashboard');
});
