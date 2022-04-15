<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create($id){
        if (empty(Book::find($id))) {
			$message = "A megadott azonosítóval nem található könyv";
			return response()->json(['message' => $message], 404);
		}
        $data = [];
		$data['start_date'] = Carbon::now();
		$data['end_date'] = Carbon::now()->addDays(7);
		$data['book_id'] = $id;
		$data['id'] = Rental::insert($data);

        
        
		/*$conflict = Rental::find($id);
		$from = $conflict->start_date ?? "";
        $till = $conflict->end_date ??"";

		$check = Carbon::now()->between($from,$till, true);

        if ($check) {
			$message = "A megadott könyv ki van kölcsönözve";
			return response()->json(response(['message' => $message], 409));
		} */
		
        
		return response()->json($data, 201);
    }
}
