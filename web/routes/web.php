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

Route::get('listnews', [NewsController::class,'show']);
Route::get('delete/{id}', [NewsController::class,'destroy']);
Route::get('edit/{id}', [NewsController::class,'edit']);
Route::post('edit', [NewsController::class,'update']);
Route::view('add','addmember');
Route::view('addnews','addnews');

Route::post('addnews',[NewsController::class, 'store']);

Route::get('tabledit', [App\Http\Controllers\TableditController::class, 'index'])->name('tabledit');

Route::post('tabledit/action', [App\Http\Controllers\TableditController::class, 'action'])->name('tabledit.action');

Route::post('tabledit/update/{id}', [App\Http\Controllers\TableditController::class, 'updateData'])->name('tabledit.updateData');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
