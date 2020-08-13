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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');
// Route::get('/details/{id}', 'DetailController@index')->name('detail');

/* ->middleware(['auth', 'admin']) */
Route::prefix('admin')->namespace('Admin')->middleware('admin')->group(function() {
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
    Route::resource('commodities', 'CommodityController');
    Route::resource('account', 'AccountController');
    Route::put('status/{id}', 'CommodityController@status')->name('status.change');
});

Route::prefix('dashboard')->middleware('surveyor')->group(function() {
    Route::get('/', 'DashboardController@index')->name('surveyor-dashboard');
    Route::resource('surveyor-commodities', 'CommodityController');
    Route::resource('surveyor-account', 'AccountController');
});

Auth::routes();