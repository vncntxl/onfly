<?php

use App\Models\Place;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;


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

Route::post('/delete', [ProfileController::class, 'delete']);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/update', [ProfileController::class, 'update']);
// Route::post('/update', [ProfileController::class, 'updateProfile'])->name('updateprofile');


Route::get('/', function () {
    $places = Place::inRandomOrder()->limit(3)->get();
    return view('landingpage', compact('places'));
});


Route::get('/home', function () {
    return view('home');
});
Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');
Route::get('/details/{name}', [DetailsController::class, 'index'])->name('details');
Route::get('/places/{id}', [PlaceController::class, 'show'])->name('show');

Route::get('/login', function () {
    return view('login');
});
Route::get('/landingpage', function () {
    return view('landingpage');
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

Route::get('/search', [SearchController::class, 'index'])->name('search');


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

Route::post('/places/{id}/add-review', 'App\Http\Controllers\ReviewController@addReview')->name('add_review');

Route::get('/sort/{place_name}', [App\Http\Controllers\PlaceController::class, 'sort'])->name('place.sort');
Route::get('/details/{place_name}/sort', [PlaceController::class, 'sort'])->name('place.sort');
Route::get('/filter', [App\Http\Controllers\PlaceController::class, 'filter'])->name('place.filter');


