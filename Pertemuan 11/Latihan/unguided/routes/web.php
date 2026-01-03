<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/asset', [MahasiswaController::class, 'showAsset']);


Route::get('/mahasiswa', function () {
    $nilai = [80,64,30,76,95];
    return view('mahasiswa',['nilai' => $nilai]);
});


Route::get('/controller-example', [MahasiswaController::class, 'index']);
