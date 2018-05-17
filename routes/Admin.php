<?php


    //Route::group(['prefix'=>'admin','middleware' => 'admin'],function (){
    Route::group(['prefix'=>'admin'],function (){

        Route::get('/',function (){
            return view('Admin.login');
        });
        Route::get('/home',function (){
            return view('Admin.home');
        })->middleware('admin');
        Route::get('/index',function (){
            return view('Admin.home');
        })->middleware('admin');
        Auth::routes();

        Route::resource('categories','CategoriesController');




    });