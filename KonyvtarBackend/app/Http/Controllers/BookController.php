<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json(['data' => $books]);
    }
    public function create(BookRequest $request)
    {
        $book = new Book($request->only('title','author','publish_year','page_count'));
        $book->save();
        return response()->json($book, 201);
    }
}
