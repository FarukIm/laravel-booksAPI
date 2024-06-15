<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;

Route::get('/', fn () => csrf_token());
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}/comments', [BookController::class, 'show'])->name('books.comments');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');