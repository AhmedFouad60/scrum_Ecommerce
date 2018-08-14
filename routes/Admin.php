<?php

    Auth::routes();

    //Route::group(['prefix'=>'admin','middleware' => 'admin'],function (){
    Route::group(['prefix'=>'admin'],function (){

        Route::get('/',function (){
            return view('Admin.AdminPanel.login');
        });
        Route::get('/Dashboard',function (){
            return view('Admin.AdminPanel.home');
        })->middleware('admin');
        Route::get('/index',function (){
            return view('Admin.AdminPanel.index');
        })->middleware('admin');

        Route::resource('users', 'UserController');

        Route::resource('categories','CategoriesController')->middleware('admin');

        Route::resource('products',"ProductsController")->middleware('admin');



    });