<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
            'book_id' => 'required',
        ]);
        if (Book::where('id', $data['book_id'])->exists()) {
            $comment = Comment::create($data);
            return response()->json($comment, 201);
        } else {
            return response()->json('Invalid book id', 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if (Book::where('id', $book->id)->exists()) {
            $comments = Comment::whereAll('id', $book->id)->get();
            return response()->json($comments, 200);
        } else {
            return response()->json('Invalid book id', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {


    }
}
