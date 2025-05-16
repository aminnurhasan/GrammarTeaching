<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\KategoriController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/locale/{locale}', [LocaleController::class, 'swap'])->name('locale');

// Autentikasi
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Admin routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Dashboard & Password
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/password/edit', [PasswordController::class, 'edit'])->name('admin.password.edit');
    Route::put('/admin/password/update', [PasswordController::class, 'update'])->name('admin.password.update');

    // Materi
    Route::get('/admin/materi', [MateriController::class, 'index'])->name('admin.materi.index');
    Route::get('/admin/materi/create', [MateriController::class, 'create'])->name('admin.materi.create');
    Route::post('/admin/materi', [MateriController::class, 'store'])->name('admin.materi.store');
    Route::get('/admin/materi/{materi}', [MateriController::class, 'show'])->name('admin.materi.show');
    Route::get('/admin/materi/{materi}/edit', [MateriController::class, 'edit'])->name('admin.materi.edit');
    Route::put('/admin/materi/{materi}', [MateriController::class, 'update'])->name('admin.materi.update');
    Route::delete('/admin/materi/{materi}', [MateriController::class, 'destroy'])->name('admin.materi.destroy');

    // Kategori
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/admin/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
});