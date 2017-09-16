<?php

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


Route::get("/","BooksController@showBooks"); 

Route::get("/books","BooksController@showBooks");
Route::get("/books/{book}","BooksController@show"); 

Route::get("/books/{book}/reservation","BooksController@showReservation"); 
Route::post("/books/reservate","BooksController@reservate"); 

Route::get("/feed","BooksController@feed"); 

Route::get("/inventory", "BooksController@showInventory");
Route::delete("/inventory", "BooksController@deleteInventory");


Auth::routes();







