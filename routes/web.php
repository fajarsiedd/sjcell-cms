<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/products', function () {
    return view('products.index', ['title' => 'Products']);
});