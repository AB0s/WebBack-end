<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
//All listing
Route::get('/', [\App\Http\Controllers\ListingController::class, 'index']);

Route::get('/listings/create',[\App\Http\Controllers\ListingController::class,'create'])->middleware('auth');

//Store listing data
Route::post('/listings/',[\App\Http\Controllers\ListingController::class,'store']);

Route::get('/listings/{listing}/edit',[\App\Http\Controllers\ListingController::class,'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [\App\Http\Controllers\ListingController::class,'update'])->middleware('auth');

Route::delete('/listings/{listing}', [\App\Http\Controllers\ListingController::class,'destroy'])->middleware('auth');

Route::get('/listings/manage',[\App\Http\Controllers\ListingController::class,'manage'])->middleware('auth');


Route::get('/listings/{listing}',[\App\Http\Controllers\ListingController::class,'show']);


//Show Register Create form
Route::get('/register', [UserController::class,'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');;

Route::post('/users/authenticate',[UserController::class,'authenticate']);



