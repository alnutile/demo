<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Blog;

Route::get('/', function () {
    $blogs = Blog::take(5)->orderBy('created_at', 'desc')->get();
    return view('home', compact('blogs'));
});


Route::get('angular', function() {
    return view('angular');
});


Route::get('foo', function() {
   return Blog::all();
});

Route::resource("comments","CommentController");

Route::resource("blogs","BlogController");