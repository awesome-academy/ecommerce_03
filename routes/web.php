<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Watch'], function() {
    Route::resource('product', 'ProductController', ['only' => 'index']);
    Route::resource('cart', 'CartController', ['only' => ['index', 'create', 'update', 'destroy']])->middleware('auth');
    Route::get('info', 'CartController@inputInfo')->name('cart.info')->middleware('auth');
    Route::post('confirm', 'CartController@confirm')->name('cart.confirm')->middleware('auth');
    Route::post('checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
});
