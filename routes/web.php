<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brau123;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insertar', function () {
    return view('create'); 
});


Route::post('/store', [brau123::class, 'store'])->name('store');
