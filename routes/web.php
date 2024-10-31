<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brau123;
use App\Http\Controllers\VapeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::post('/vapes/{vape}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('vapes/{vape}', [VapeController::class, 'show'])->name('vapes.show');

Route::resource('vapes', VapeController::class);
Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insertar', function () {
    return view('create'); 
});


Route::post('/store', [brau123::class, 'store'])->name('store');
