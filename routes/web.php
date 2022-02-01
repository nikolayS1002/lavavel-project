<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/about/feedback', [HomeController::class, 'feedback'])->name('about.feedback.store');
Route::post('/about/data', [HomeController::class, 'data'])->name('about.data.store');

//news routes

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::get('/news/add', [NewsController::class, 'add'])
    ->name('news.add');
Route::get('/news/categories', [CategoryController::class, 'index'])
    ->name('news.categories');
Route::get('/news/categories/{category}', [CategoryController::class, 'getNewsByCategory'])
    ->name('news.category')
    ->where(['category', '\d+']);
Route::get('/newss', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('news/{id}', [NewsController::class, 'show'])
    ->where(['news', '\d+'])
    ->name('news.show');

Route::get('/collection', function () {
    $array = ['Anna', 'Victor', 'Alexey', 'Dima', 'Ira', 'Vasya', 'Olya'];
    $collection = collect($array);
    dd($collection->map(function ($item) {
        return mb_strtolower($item);
    })->sort());
});

