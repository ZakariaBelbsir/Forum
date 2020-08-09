<?php

use App\Http\Controllers\ThreadsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/threads', 'ThreadsController@index');
Route::get('/threads/create', 'ThreadsController@create');
Route::post('/threads', 'ThreadsController@store')->name('threads.store');
Route::get('/threads/{channel:slug}', 'ThreadsController@index');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::delete('/threads/{channel}/{thread}', 'ThreadsController@destroy');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store')->name('add_reply');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::get('/profiles/{user:name}' , 'ProfilesController@show')->name('profile');