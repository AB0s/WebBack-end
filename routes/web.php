<?php

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
//Single Listing
Route::get('/listing/{listing}',[\App\Http\Controllers\ListingController::class,'show']);





