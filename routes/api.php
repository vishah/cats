<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreedController;

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

//Verb          Path                        Action  Route Name
//GET           /breeds                      index   breeds.index
//POST          /breeds                      store   breeds.store
//GET           /breeds/{breed}               show    breeds.show
//PUT|PATCH     /breeds/{breed}               update  breeds.update
//DELETE        /breeds/{breed}               destroy breeds.destroy
Route::apiResource('breeds', BreedController::class);


