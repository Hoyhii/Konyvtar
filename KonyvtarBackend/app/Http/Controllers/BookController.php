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
        $book = Book::all();
        return response()->json($book, 201);
    }
    public function create(BookRequest $request)
    {

        $validator = Validator::make($request->all(), (new BookRequest())->rules());
        if  ($validator->fails()) {
            $errormsg = "";
            foreach ($validator->errors()->all() as $error) {
                $errormsg .= $error . " ";
            }
            $errormsg = trim($errormsg);
            return response()->json($errormsg, 400);
        }
        
        $request->validated();
        $book = Book::all();
        return response()->json($book, 201);
    }
}
