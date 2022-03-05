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

Route::get('/', 'LandingController@index')->name('landing');
Route::get('/detail/{id}', 'LandingController@detail');

Route::prefix('/admin')->group(function () {
    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('/category', 'CategoryController');

    Route::post('/product/image', 'ProductController@ImageProduct')->name('product.image');
    Route::resource('/product', 'ProductController');

    Route::resource('/banner', 'BannerController');

    Route::get('/profile', 'HomeController@profile')->name('profile.index');
    Route::post('/profile/{profile}', 'HomeController@updateProfile')->name('profile.update');

    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::post('/settings', 'SettingsController@update')->name('settings.update');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::delete('/users/{id}', 'UserController@destroy')->name('users.destroy');
});
