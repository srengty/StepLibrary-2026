<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index'])->name('home');
Route::resources([
    'authors'=>AuthorsController::class,
    'categories'=>CategoriesController::class,
    'books'=>BooksController::class,
]);