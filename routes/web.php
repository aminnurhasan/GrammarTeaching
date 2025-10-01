<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\MateriUserController;
use App\Http\Controllers\User\KuisUserController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\KuisController;
use App\Http\Controllers\Admin\HasilKuisController;
use App\Http\Controllers\Admin\HasilSurveyController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/registerAdmin', [AuthController::class, 'showRegistrationAdminForm'])->name('registerAdmin.form');
Route::post('/registerAdmin', [AuthController::class, 'registerAdmin'])->name('registerAdmin');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/locale/{locale}', [LocaleController::class, 'swap'])->name('locale');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
    Route::get('/materi/{slug}', [MateriUserController::class, 'show'])->name('materi.show');
});

Route::prefix('kuis')->name('kuis.')->group(function () {
    // Rute untuk pretest
    Route::get('/pretest', [KuisUserController::class, 'pretest'])->name('pretest');
    Route::post('/pretest', [KuisUserController::class, 'storePretest'])->name('pretest.store');

    // Rute untuk posttest
    Route::get('/posttest', [KuisUserController::class, 'posttest'])->name('posttest');
    Route::post('/posttest', [KuisUserController::class, 'storePosttest'])->name('posttest.store');

    // Route untuk pilihan ganda
    Route::get('/pilihan-ganda', [KuisUserController::class, 'pilihanGanda'])->name('pilihanGanda');
    Route::post('/pilihan-ganda', [KuisUserController::class, 'storePilihanGanda'])->name('pilihanGanda.store');

    // Route untuk acak kata
    Route::get('/acak-kata', [KuisUserController::class, 'acakKata'])->name('acakKata');
    Route::post('/acak-kata', [KuisUserController::class, 'storeAcakKata'])->name('acakKata.store');

    // Route untuk hasil kuis
    Route::get('/hasil/{id}', [KuisUserController::class, 'showResults'])->name('hasil');
});

// Admin routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Dashboard & Password
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');

    // Hasil Kuis
    Route::get('/hasil-kuis', [HasilKuisController::class, 'index'])->name('hasilKuis.index');
    Route::get('/hasil-kuis/{hasilKuis}', [HasilKuisController::class, 'show'])->name('hasilKuis.show');

    // Hasil Survey
    Route::get('/hasil-survey', [HasilSurveyController::class, 'index'])->name('hasilSurvey.index');
    Route::get('/hasil-survey/{userId}/{type}', [HasilSurveyController::class, 'showSurveyResult'])->name('hasilSurvey.show_survey_result');

    // Materi
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/{materi}', [MateriController::class, 'show'])->name('materi.show');
    Route::get('/materi/{materi}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::put('/materi/{materi}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{materi}', [MateriController::class, 'destroy'])->name('materi.destroy');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Survey
    Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
        // Survey Pretest
        Route::get('/survey/pretest', [SurveyController::class, 'pretest'])->name('survey.pretest');
        Route::get('/survey/pretest/create', [SurveyController::class, 'createPretest'])->name('survey.pretest.create');
        Route::post('/survey/pretest', [SurveyController::class, 'storePretest'])->name('survey.pretest.store');
        Route::get('/survey/pretest/{survey}', [SurveyController::class, 'showPretest'])->name('survey.pretest.show');
        Route::get('/survey/pretest/{survey}/edit', [SurveyController::class, 'editPretest'])->name('survey.pretest.edit');
        Route::put('/survey/pretest/{survey}', [SurveyController::class, 'updatePretest'])->name('survey.pretest.update');
        Route::delete('/survey/pretest/{survey}', [SurveyController::class, 'destroyPretest'])->name('survey.pretest.destroy');
        
        // Survey PostTest
        Route::get('/survey/posttest', [SurveyController::class, 'posttest'])->name('survey.posttest');
        Route::get('/survey/posttest/create', [SurveyController::class, 'createPosttest'])->name('survey.posttest.create');
        Route::post('/survey/posttest', [SurveyController::class, 'storePosttest'])->name('survey.posttest.store');
        Route::get('/survey/posttest/{survey}', [SurveyController::class, 'showPosttest'])->name('survey.posttest.show');
        Route::get('/survey/posttest/{survey}/edit', [SurveyController::class, 'editPosttest'])->name('survey.posttest.edit');
        Route::put('/survey/posttest/{survey}', [SurveyController::class, 'updatePosttest'])->name('survey.posttest.update');
        Route::delete('/survey/posttest/{survey}', [SurveyController::class, 'destroyPosttest'])->name('survey.posttest.destroy');

    // Kuis
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
        // Pilihan Ganda
        Route::get('/kuis/pilihanganda', [KuisController::class, 'indexPilihanGanda'])->name('kuis.pilihanGanda');
        Route::get('/kuis/pilihanganda/create', [KuisController::class, 'createPilihanGanda'])->name('kuis.pilihanGanda.create');
        Route::post('/kuis/pilihanganda/store', [KuisController::class, 'storePilihanGanda'])->name('kuis.pilihanGanda.store');
        Route::get('/kuis/pilihanganda/{pilihanGanda}', [KuisController::class, 'showPilihanGanda'])->name('kuis.pilihanGanda.show');
        Route::get('/kuis/pilihanganda/{pilihanGanda}/edit', [KuisController::class, 'editPilihanGanda'])->name('kuis.pilihanGanda.edit');
        Route::put('/kuis/pilihanganda/{pilihanGanda}', [KuisController::class, 'updatePilihanGanda'])->name('kuis.pilihanGanda.update');
        Route::delete('/kuis/pilihanganda/{pilihanGanda}', [KuisController::class, 'destroyPilihanGanda'])->name('kuis.pilihanGanda.destroy');
        
        // Susun Kata
        Route::get('/kuis/susunkata', [KuisController::class, 'indexSusunKata'])->name('kuis.susunKata');
        Route::get('/kuis/susunkata/create', [KuisController::class, 'createSusunKata'])->name('kuis.susunKata.create');
        Route::post('/kuis/susunkata/store', [KuisController::class, 'storeSusunKata'])->name('kuis.susunKata.store');
        Route::get('/kuis/susunkata/{susunKata}', [KuisController::class, 'showSusunKata'])->name('kuis.susunKata.show');
        Route::get('/kuis/susunkata/{susunKata}/edit', [KuisController::class, 'editSusunKata'])->name('kuis.susunKata.edit');
        Route::put('/kuis/susunkata/{susunKata}', [KuisController::class, 'updateSusunKata'])->name('kuis.susunKata.update');
        Route::delete('/kuis/susunkata/{susunKata}', [KuisController::class, 'destroySusunKata'])->name('kuis.susunKata.destroy');
});