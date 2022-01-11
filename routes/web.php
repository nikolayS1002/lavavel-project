<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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


//news routes

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::get('/news', [NewsController::class, 'index'])
->name('news.index');
Route::get('news/{id}', [NewsController::class, 'show'])
->where(['id', '\d+'])
->name('news.show');
