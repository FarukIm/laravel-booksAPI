<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\Book;

class BookController extends Controller
{
    public function index($page)
    {
        $offset = ($page - 1) * 12;
        $books = Book::skip($offset)->take(12)->get();
        $total = Book::count();
        $pageCount = ceil($total / 12);
        if ($page > $pageCount) {
            return response()->json(['message' => 'Page not found'], 404);
        }
        $response = [
            'books' => $books,
            'page' => $page,
            'total' => $total,
            'pageCount' => $pageCount
        ];
        return response()->json($response);
    }

    public function search($page, $search)
    {
        $offset = ($page - 1) * 12;
        $books = Book::where('title', 'like', '%' . $search . '%')->skip($offset)->take(12)->get();
        $total = Book::where('title', 'like', '%' . $search . '%')->count();
        $pageCount = ceil($total / 12);
        if ($page > $pageCount) {
            return response()->json(['message' => 'Page not found'], 404);
        }
        $response = [
            'books' => $books,
            'page' => $page,
            'total' => $total,
            'pageCount' => $pageCount
        ];
        return response()->json($response);
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
            if ($book->like_count - 1 < 0) {
                return response()->json('Like cannot be lower than 0', 401);
            }
            $book->like_count = $book->like_count - 1;
        }
        $book->save();
        return response()->json($book, 201);
    }
}
