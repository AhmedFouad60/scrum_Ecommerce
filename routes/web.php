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

//login with social networks [twitter,Gmail,Github]
Route::get('auth/{provider}', 'AuthSocialController@redirectToProvider'); //send request to twitter to get user info
Route::get('auth/{provider}/callback', 'AuthSocialController@handleProviderCallback');
Route::get('/test','CategoriesController@index');