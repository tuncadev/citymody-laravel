<?php

use App\Models\Menu;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//All Listings
Route::get('/', [ListingController::class, 'index']);

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Create listing form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Edit listing data
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Edit Submit to Update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Single Listing  
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show User Register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user 
Route::post('/users', [UserController::class, 'store']);

//Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guesthome');

//Log User in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');