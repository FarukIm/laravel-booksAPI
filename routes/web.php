<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::put('/books/{id}/likes', [BookController::class, 'updateLikes'])->name('books.updateLikes');
Route::get('/books', [BookController::class, 'search'])->name('books.search');

Route::get('/books/{id}/comments', [CommentController::class, 'show'])->name('books.comments');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');