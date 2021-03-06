<?php

use App\Http\Controllers\NewsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//News routes

// Routes the news with the NewsController class
Route::resource('news', NewsController::class);

// Routes the /api/news with the createAPIResponse function
Route::post('/api/news',[\App\Helpers\APIHelpers::class, 'createAPIResponse']);
