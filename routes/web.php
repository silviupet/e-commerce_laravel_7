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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('shop', 'ShopController@index')->name('shop.index');
Route::get('shop/{product}', 'ShopController@show')->name('shop.show');


Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart', 'CartController@store')->name('cart.store');
Route::patch('cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('save-for-later/{product}', 'SaveForLaterController@store')->name('saveforlater.store');
Route::post('save-for-later/{product}/move-to-cart', 'SaveForLaterController@moveToCart')->name('saveforlater.movetocart');
Route::delete('save-for-later/{product}', 'SaveForLaterController@destroy')->name('saveforlater.destroy');

Route::get('checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('coupon', 'CouponController@store')->name('coupon.store');
Route::delete('coupon', 'CouponController@destroy')->name('coupon.destroy');
