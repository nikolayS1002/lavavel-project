<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

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

//$text = '<h1>Привет мир!</h1>';
//Route::get('/', function () use ($text) {
//    return $text;
//  });

Route::get('/', [HomeController::class, 'index'])->name('start');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/about/feedback', [HomeController::class, 'feedback'])->name('about.feedback.store');
Route::post('/about/data', [HomeController::class, 'data'])->name('about.data.store');

//news routes

//admin
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/account/logout', function () {
        \Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::view('/', 'admin.index')->name('index');
        Route::match(['post', 'get'], '/profile/update', [AdminProfileController::class, 'update'])
        ->name('profile.update');
        Route::get('/profile', [AdminProfileController::class, 'index'])
        ->name('profile.index');
        Route::get('/profile/edit/{user}', [AdminProfileController::class, 'edit'])
        ->name('profile.edit');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
    });
});

Route::get('/news/add', [NewsController::class, 'add'])
    ->name('news.add');
Route::get('/news/categories', [CategoryController::class, 'index'])
    ->name('news.categories');
Route::get('/news/categories/{category}', [CategoryController::class, 'getNewsByCategory'])
    ->name('news.category')
    ->where(['category', '\d+']);
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
	->where('news', '\d+')
	->name('news.show');

Route::get('/collection', function () {
    $array = ['Anna', 'Victor', 'Alexey', 'Dima', 'Ira', 'Vasya', 'Olya'];
    $collection = collect($array);
    dd($collection->map(function ($item) {
        return mb_strtolower($item);
    })->sort());
});


Route::get('/session', function () {
    if (session()->has('title')) {
//        dd(session()->all(), session()->get('title'));
        session()->forget('title');
    }

    session(['title' => 'name']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admins', function () {
    $users = \App\Models\User::query()->admins()->get();
    dd($users);
});

Route::group(['middleware' => 'guest', 'prefix' => 'auth', 'as' => 'social.'], function () {

    Route::get('/{network}/redirect', [SocialController::class, 'redirect'])
    ->name('redirect');

    Route::get('/{network}/callback', [SocialController::class, 'callback'])
    ->name('callback');
});
