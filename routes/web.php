<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::post('/chatbot', [ChatbotController::class, 'respond']);


Route::get('/', function () {
    return redirect('/authors');
});


