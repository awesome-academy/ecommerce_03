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

Route::pattern('id','([0-9]*)');
Route::pattern('name','(.*)');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Watch'], function() {
    Route::resource('/', 'ProductController', ['only' => 'index']);
    Route::get('{name}/{id}', 'ProductController@detail')->name('product.detail');
    Route::get('filter', 'ProductController@filter')->name('product.filter');

    Route::resource('cart', 'CartController', ['only' => ['index', 'create', 'update', 'destroy']])->middleware('auth');
    Route::get('changecart', 'CartController@changeCart')->name('cart.change')->middleware('auth');
    Route::get('info', 'CartController@inputInfo')->name('cart.info')->middleware('auth');
    Route::post('confirm', 'CartController@confirm')->name('cart.confirm')->middleware('auth');
    Route::post('checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');

    Route::resource('profile', 'ProfileController', ['only' => 'index'])->middleware('auth');
    Route::get('your-order', 'ProfileController@yourOrder')->name('profile.order')->middleware('auth');

    Route::resource('rating', 'RatingController', ['only' => 'index'])->middleware('auth');
    Route::get('changerating', 'RatingController@changeRating')->name('rating.changerating')->middleware('auth');
});
