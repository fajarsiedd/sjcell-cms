<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/login', function () {
    return view('login');
});

Route::get('/', [DashboardController::class, 'index']);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);