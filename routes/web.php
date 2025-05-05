<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/locale/{locale}', [LocaleController::class, 'swap'])->name('locale');

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function (){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/password/edit', [PasswordController::class, 'edit'])->name('admin.password.edit');
    Route::put('/admin/password/update', [PasswordController::class, 'update'])->name('admin.password.update');
});