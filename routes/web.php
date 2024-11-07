<?php

use App\Http\Controllers\HitungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\TentangController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hitung', [HitungController::class, 'index'])->name('hitung');
Route::get('/detail/{id}', [HitungController::class, 'detail'])->name('detail');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/caridata/{total}', [HitungController::class, 'caridata']);


Route::resource('/kost', KostController::class)->names('kost');
Route::resource('/range', RangeController::class)->names('range');
