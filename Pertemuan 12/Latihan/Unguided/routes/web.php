<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk E-commerce AMitra Furniture
// 1. Insert menggunakan Raw SQL
Route::get('/product/insert-sql', [ProductController::class, 'insertRawSQL']);

// 2. Insert menggunakan Query Builder
Route::get('/product/insert-qb', [ProductController::class, 'insertQueryBuilder']);

// 3. Insert menggunakan Eloquent ORM
Route::get('/product/insert-eloquent', [ProductController::class, 'insertEloquent']);

// View semua produk
Route::get('/products', [ProductController::class, 'index']);
