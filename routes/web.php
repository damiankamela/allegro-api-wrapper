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

Route::get('/', 'HomepageController@welcome')->name('homepage');

Route::get('login', 'OauthController@login')->name('login');
Route::get('oauth_login', 'OauthController@oauthLogin');
Route::get('oauth', 'OauthController@oauthCallback');
