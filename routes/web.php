<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('posts','PostController')->middleware('auth');
Route::post('/comments/store','CommentController@store')->name('comments.store');
Auth::routes();

Route::get('/home','PostController@index');

