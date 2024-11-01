<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brau123;
use App\Http\Controllers\VapeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/vapes', [VapeController::class, 'index'])->name('vapes.index');


Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');



Route::post('/vapes/{vape}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/vapes', [VapeController::class, 'index'])->name('vapes.index'); 
Route::get('/vapes/create', [VapeController::class, 'create'])->name('vapes.create');
Route::post('/vapes', [VapeController::class, 'store'])->name('vapes.store');
Route::get('/vapes/{vape}', [VapeController::class, 'show'])->name('vapes.show'); 
Route::get('/vapes/{vape}/edit', [VapeController::class, 'edit'])->name('vapes.edit'); 
Route::put('/vapes/{vape}', [VapeController::class, 'update'])->name('vapes.update'); 
Route::delete('/vapes/{vape}', [VapeController::class, 'destroy'])->name('vapes.destroy'); 


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); 
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create'); 
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store'); 
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show'); 
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); 
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update'); 
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy'); 


Route::get('/', function () {
    return view('welcome');
});



Route::post('/store', [brau123::class, 'store'])->name('store');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');
