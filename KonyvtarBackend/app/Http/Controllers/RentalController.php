<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create(Request $request, Book $book){
        $count = Rental::where('book_id', $book->id)
            ->where('start_date','<=',Carbon::now())
            ->where('end_date','>=',Carbon::now())
            ->count();
        if ($count > 0) {
            return response()->json(['message' => 'A konyv mar foglalt'], 409);
        }
		
        $rental = new Rental();
        $rental->book_id = $book->id;
        $rental->start_date = Carbon::now();
        $rental->end_date = Carbon::now()->addWeek();
        $rental->save();
        
		return response()->json($rental);
    }
}
