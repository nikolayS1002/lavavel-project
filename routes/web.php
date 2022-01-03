<?php

use Illuminate\Support\Facades\Route;

$text = '<h1>Привет мир!</h1>';
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


/*Route::get('/', fn () => $text)*/
/*
Route::get('/', function () use ($text) {
    return $text;
  });
*/
Route::get('/', function () {
    return ('welcome');
});

Route::get('/about', function () {
    return ('about');
});

Route::get('/news/{number}', function ($number) {
    return ('news' + $number);
});
