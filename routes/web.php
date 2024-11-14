<?php

use App\Http\Controllers\appController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main');
Route::get('/', [appController::class, 'index']);
Route::view('/beliJamu', 'paketJamu');
Route::view('/konsultasi', 'konsultasi');
Route::view('/beliJamu', 'paketJamu');
Route::view('/about', 'About');
Route::post('/keluhan', [appController::class, 'store'])->name('keluhan');
Route::post('/diagnosa', [appController::class, 'diagnosa'])->name('diagnosa');
Route::post('/belijamu', [appController::class, 'belijamu'])->name('belijamu');




