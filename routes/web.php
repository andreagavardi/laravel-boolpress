<?php

//use App\Http\Controllers\Admin\ArticleController;

//use App\Http\Controllers\ArticleController;

use App\Http\Controllers\CategoryController;
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

Route::get('/', 'PageController@index');
Route::get('/contacts', 'PageController@contact')->name('contact');
Route::post('contacts', 'ContactController@store')->name('contacts.send');
Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');
Auth::routes();

/* Admin Routes */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('articles', ArticleController::class);
});
Route::resource('articles', ArticleController::class)->only(['index', 'show']);
