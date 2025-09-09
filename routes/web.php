<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriUserController;
use App\Http\Controllers\KuisUserController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\KuisController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/locale/{locale}', [LocaleController::class, 'swap'])->name('locale');

Route::get('/materi/{slug}', [MateriUserController::class, 'show'])->name('materi.show');

Route::prefix('kuis')->name('kuis.')->group(function () {
    // Rute untuk biodata
    Route::get('/biodata', [KuisUserController::class, 'biodata'])->name('biodata');
    Route::post('/biodata', [KuisUserController::class, 'storeBiodata'])->name('biodata.store');

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
});

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

    // Survey
    Route::get('admin/survey', [SurveyController::class, 'index'])->name('admin.survey.index');
        // Survey Pretest
        Route::get('/admin/survey/pretest', [SurveyController::class, 'pretest'])->name('admin.survey.pretest');
        Route::get('/admin/survey/pretest/create', [SurveyController::class, 'createPretest'])->name('admin.survey.pretest.create');
        Route::post('/admin/survey/pretest', [SurveyController::class, 'storePretest'])->name('admin.survey.pretest.store');
        Route::get('/admin/survey/pretest/{survey}', [SurveyController::class, 'showPretest'])->name('admin.survey.pretest.show');
        Route::get('/admin/survey/pretest/{survey}/edit', [SurveyController::class, 'editPretest'])->name('admin.survey.pretest.edit');
        Route::put('/admin/survey/pretest/{survey}', [SurveyController::class, 'updatePretest'])->name('admin.survey.pretest.update');
        Route::delete('/admin/survey/pretest/{survey}', [SurveyController::class, 'destroyPretest'])->name('admin.survey.pretest.destroy');
        
        // Survey PostTest
        Route::get('/admin/survey/posttest', [SurveyController::class, 'posttest'])->name('admin.survey.posttest');
        Route::get('/admin/survey/posttest/create', [SurveyController::class, 'createPosttest'])->name('admin.survey.posttest.create');
        Route::post('/admin/survey/posttest', [SurveyController::class, 'storePosttest'])->name('admin.survey.posttest.store');
        Route::get('/admin/survey/posttest/{survey}', [SurveyController::class, 'showPosttest'])->name('admin.survey.posttest.show');
        Route::get('/admin/survey/posttest/{survey}/edit', [SurveyController::class, 'editPosttest'])->name('admin.survey.posttest.edit');
        Route::put('/admin/survey/posttest/{survey}', [SurveyController::class, 'updatePosttest'])->name('admin.survey.posttest.update');
        Route::delete('/admin/survey/posttest/{survey}', [SurveyController::class, 'destroyPosttest'])->name('admin.survey.posttest.destroy');

    // Kuis
    Route::get('/admin/kuis', [KuisController::class, 'index'])->name('admin.kuis.index');
        // Pilihan Ganda
        Route::get('/admin/kuis/pilihanganda', [KuisController::class, 'indexPilihanGanda'])->name('admin.kuis.pilihanGanda');
        Route::get('/admin/kuis/pilihanganda/create', [KuisController::class, 'createPilihanGanda'])->name('admin.kuis.pilihanGanda.create');
        Route::post('/admin/kuis/pilihanganda/store', [KuisController::class, 'storePilihanGanda'])->name('admin.kuis.pilihanGanda.store');
        Route::get('/admin/kuis/pilihanganda/{pilihanGanda}', [KuisController::class, 'showPilihanGanda'])->name('admin.kuis.pilihanGanda.show');
        Route::get('/admin/kuis/pilihanganda/{pilihanGanda}/edit', [KuisController::class, 'editPilihanGanda'])->name('admin.kuis.pilihanGanda.edit');
        Route::put('/admin/kuis/pilihanganda/{pilihanGanda}', [KuisController::class, 'updatePilihanGanda'])->name('admin.kuis.pilihanGanda.update');
        Route::delete('/admin/kuis/pilihanganda/{pilihanGanda}', [KuisController::class, 'destroyPilihanGanda'])->name('admin.kuis.pilihanGanda.destroy');
        
        // Susun Kata
        Route::get('/admin/kuis/susunkata', [KuisController::class, 'indexSusunKata'])->name('admin.kuis.susunKata');
        Route::get('/admin/kuis/susunkata/create', [KuisController::class, 'createSusunKata'])->name('admin.kuis.susunKata.create');
        Route::post('/admin/kuis/susunkata/store', [KuisController::class, 'storeSusunKata'])->name('admin.kuis.susunKata.store');
        Route::get('/admin/kuis/susunkata/{susunKata}', [KuisController::class, 'showSusunKata'])->name('admin.kuis.susunKata.show');
        Route::get('/admin/kuis/susunkata/{susunKata}/edit', [KuisController::class, 'editSusunKata'])->name('admin.kuis.susunKata.edit');
        Route::put('/admin/kuis/susunkata/{susunKata}', [KuisController::class, 'updateSusunKata'])->name('admin.kuis.susunKata.update');
        Route::delete('/admin/kuis/susunkata/{susunKata}', [KuisController::class, 'destroySusunKata'])->name('admin.kuis.susunKata.destroy');
});