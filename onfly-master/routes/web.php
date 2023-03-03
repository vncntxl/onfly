<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PlaceController;


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

Route::get('/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::get('/register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    // handle the login process
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function () {
    // handle the registration process
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search-results/{query}', [SearchController::class, 'searchResults'])->name('search-results');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [TestController::class, 'index'])->name('test');

Route::get('/input', [PlaceController::class, 'showInputForm'])->name('input');
Route::post('/input', [PlaceController::class, 'store'])->name('places.store');
Route::get('/places/create', [PlaceController::class, 'showInputForm'])->name('input');
Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::delete('/places/{place}', [PlaceController::class, 'destroy'])->name('places.destroy');


