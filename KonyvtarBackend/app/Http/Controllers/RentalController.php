<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create($id){
        if (empty(Book::find($id))) {
			$message = "A megadott azonosítóval nem található könyv";
			return response()->json(['message' => $message], 404);
		}
        $data = [];
		$data['start_date'] = date('Y-m-d');
		$data['end_date'] = date('Y-m-d', strtotime('+1 week'));
		$data['book_id'] = $id;
		$data['id'] = Rental::insert($data);

        $from = $data['start_date'];
        $till = $data['end_date'];
        
		$conflict = Rental::find($id);

        /*if ($conflict->start_date <= $from && $conflict->start_date >= $from && $conflict->end_date <= $till && $conflict->end_date >= $till) {
			$message = "A megadott könyv ki van kölcsönözve";
			return response()->json(response(['message' => $message], 409));
		}*/
        //IDK
		
        
		return response()->json($data, 201);
    }
}
