<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/book', [BookController::class, 'index']);
Route::post('/book', [BookController::class, 'create']);
Route::post('/book/{book}/rent', [RentalController::class, 'create']);
