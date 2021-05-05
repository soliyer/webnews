<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', function () {
//     return "hello world";
// });

// Route::get('/about', function () {
//     return view('pages.about');
// });
// Route::get('/users/{id}/{name}', function ($name ,$id) {
//     return 'welcome dear '. $name . ' your id is '. $id;
// });

Route::get('/index','App\Http\Controllers\PagesController@index');
Route::get('/name','App\Http\Controllers\PagesController@name');
Route::get('/about','App\Http\Controllers\PagesController@about');
Route::get('/services','App\Http\Controllers\PagesController@services');
Route::resource('posts','App\Http\Controllers\PostsController');




Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
