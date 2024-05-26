<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/user1', function (Request $request) {
    return response()->json([
        'token_type' => 'Bearer',

    ]);
});


Route::middleware('auth:sanctum')->prefix('v1')->group( function(){ // api/v1

    Route::post('/user1', function (Request $request) {
        return response()->json([
            'token_type' => 'Bearer112',
        ]);
    });
Route::middleware('auth:sanctum')->prefix('cars1')->group( function(){//start of   api/v1/cars1

    Route::controller(App\Http\Controllers\apiv1\CarListing::class)->group(function () {
        Route::post('/listings', 'listings');
        Route::post('/addnew', 'addnew');
    });



}); //end of   api/v1/cars1




}); //end of   api/v1