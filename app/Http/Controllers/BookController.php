<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function updateLikes(Request $request, $id)
    {
        $like = $request->validate([
            'add' => ['required', 'boolean']
        ]);
        $book = Book::findOrFail($id);

        if ($like['add']) {
            $book->like_count = $book->like_count + 1;
        } else {
            $book->like_count = $book->like_count - 1;
        }
        $book->save();
        return response()->json($book, 201);
    }
}
