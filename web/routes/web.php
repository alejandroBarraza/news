<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes the listnews with the show function
Route::get('listnews', [NewsController::class,'show']);

// Routes the delete option with the destroy function
Route::get('delete/{id}', [NewsController::class,'destroy']);

// Routes the edit option with the edit function
Route::get('edit/{id}', [NewsController::class,'edit']);

// Routes the edit with the update function
Route::post('edit', [NewsController::class,'update']);

// Routes the addnews with the addnews view
Route::view('addnews','addnews');

// Routes the addnews with the store function
Route::post('addnews',[NewsController::class, 'store']);

Route::get('tabledit', [App\Http\Controllers\TableditController::class, 'index'])->name('tabledit');

Route::post('tabledit/action', [App\Http\Controllers\TableditController::class, 'action'])->name('tabledit.action');

Route::post('tabledit/update/{id}', [App\Http\Controllers\TableditController::class, 'updateData'])->name('tabledit.updateData');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
