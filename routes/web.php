<?php

use App\Http\Controllers\appController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'main');
Route::view('/', 'index');
Route::view('/beliJamu', 'paketJamu');
Route::view('/konsultasi', 'konsultasi');
Route::view('/diagnosa', 'diagnosa');
Route::post('/keluhan', [appController::class, 'store'])->name('keluhan');
Route::post('/diagnosa', [appController::class, 'diagnosa'])->name('diagnosa');



