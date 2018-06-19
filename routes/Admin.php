<?php


    //Route::group(['prefix'=>'admin','middleware' => 'admin'],function (){
    Route::group(['prefix'=>'admin'],function (){

        Route::get('/',function (){
            return view('Admin.AdminPanel.login');
        });
        Route::get('/home',function (){
            return view('Admin.AdminPanel.home');
        })->middleware('admin');
        Route::get('/index',function (){
            return view('Admin.AdminPanel.index');
        })->middleware('admin');
        Auth::routes();

        Route::resource('categories','CategoriesController')->middleware('admin');

//        Route::get('product',function (){
//           return view('Admin.products.index');
//        });


        Route::resource('products',"ProductsController")->middleware('admin');



    });