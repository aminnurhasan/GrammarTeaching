<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/biodata', [GameController::class, 'biodata'])->name('biodata');
Route::post('/biodata/store', [GameController::class, 'biodataStore'])->name('biodata.store');

Route::get('/survey/pretest', [GameController::class, 'preTest'])->name('survey.pretest');
Route::post('/survey/pretest/store', [GameController::class, 'storePreTest'])->name('survey.pretest.store');