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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'AdminController@dashboard');

// Subscription payment routes
Route::post('/checkout-subscription', 'SubscriptionController@post_subscription');
Route::get('/checkout-subscription', 'SubscriptionController@checkout_subscription');

Route::get('/subscription/success', 'SubscriptionController@success');
Route::get('/subscription/cancel', 'SubscriptionController@cancel');

Route::post('/subscription/notify', 'SubscriptionController@notify');