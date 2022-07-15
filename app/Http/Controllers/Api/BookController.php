<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books(Author $author): JsonResponse
    {
        return response()->json($author->books()->get(['id', 'title', 'author_id']), 200);
    }

    public function book($id): JsonResponse
    {
        $book = Book::find($id);
        if (is_null($book)){
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json($book, 200);
    }

    public function update(Request $request, Book $book): JsonResponse
    {
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function delete(Book $book): JsonResponse
    {
        $book->delete();
        return response()->json('', 204);
    }
}
