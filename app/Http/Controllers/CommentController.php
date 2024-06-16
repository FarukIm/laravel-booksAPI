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
            'content' => ['required', 'string'],
            'book_id' => ['required', 'numeric'],
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
    public function show(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $comments = $book->comments;
        if (count($comments) > 0) {
            return response()->json($comments);
        } else {
            return response()->json(null, 204);
        }
    }
}
