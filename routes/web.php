<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index'])->name('home');
Route::resource('authors',AuthorsController::class)->only(['index','show']);
Route::resource('categories',CategoriesController::class)
    ->only(['index','show'])->middleware('auth');
Route::resource('books',BooksController::class)->only(['index','show']);
Route::resource('authors',AuthorsController::class)->except(['index','show'])->middleware('auth');
Route::resource('categories',CategoriesController::class)->except(['index','show'])->middleware('auth');
Route::resource('books',BooksController::class)->except(['index','show'])->middleware('auth');
Route::prefix('admin')->group(function(){
    Route::get('dashboard', function(){
        return '<h1>Admin page</h1>';
    });
})->middleware('auth');
Route::prefix('teacher')->group(function(){
    Route::get('dashboard', function(){
        return '<h1>Teacher page</h1>';
    });
})->middleware('auth');
Route::get('login',[LoginController::class,'index']);
Route::post('login',[LoginController::class,'login']);
Route::get('logout',[LoginController::class,'logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
