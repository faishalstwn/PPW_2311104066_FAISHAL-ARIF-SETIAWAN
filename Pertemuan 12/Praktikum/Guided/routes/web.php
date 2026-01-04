<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// INSERT
Route::get('/insert-data1', [MahasiswaController::class,'insertSql']);
Route::get('/insert-data2', [MahasiswaController::class,'insertQB']);
Route::get('/insert-data3', [MahasiswaController::class,'insertEloquent']);

// UPDATE
Route::get('/update-data', [MahasiswaController::class,'updateQB']);
Route::get('/update-eloquent', [MahasiswaController::class,'updateEloquent']);

// DELETE
Route::get('/delete-data', [MahasiswaController::class,'deleteQB']);
Route::get('/delete-eloquent', [MahasiswaController::class,'deleteEloquent']);

// SELECT
Route::get('/select-all', [MahasiswaController::class,'selectAllQB']);
Route::get('/select-where', [MahasiswaController::class,'selectWhereQB']);
Route::get('/select-all-eloquent', [MahasiswaController::class,'selectAllEloquent']);
Route::get('/select-where-eloquent', [MahasiswaController::class,'selectWhereEloquent']);
