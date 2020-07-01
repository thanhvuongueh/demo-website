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
Route::get("twitter",function(){
    return "Twitter";
});
Route::get('/','FrontendController@getHomePage');
Route::get("category/{id}/{alias}/{method?}",'FrontendController@getCategoryPage');
Route::get("product/{id}/{alias}",'FrontendController@getProductPage');
Route::get('contact','FrontendController@getContactPage');
Route::post('contact','FrontendController@postContactPage');
Route::get('cart','FrontendController@getCartPage');
Route::get('checkout','FrontendController@getCheckoutPage');
Route::post('checkout','FrontendController@postCheckoutPage');
Route::get('search','FrontendController@getSearchPage');

Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{productId}','CartController@addToCart');
    Route::get('remove-cart','CartController@removeCart');
    Route::get('remove-product/{productId}','CartController@removeProduct');
    Route::get('increase/{productId}','CartController@increase');
    Route::get('reduce/{productId}','CartController@reduce');
    Route::get('update/{productId}/{numberProduct}','CartController@update');
});
Route::get('add-to-cart/{idProduct}','CartController@addToCart');



Route::get('admin/login','UserController@getLogin')->name("login");
Route::post('admin/login','UserController@postLogin');
Route::get('admin/logout','UserController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::group(['prefix'=>'cate'],function(){
        Route::get('list','CateController@getList');
        Route::get('add','CateController@getAdd');
        Route::post('add','CateController@postAdd');
        Route::get('edit/{id}','CateController@getEdit');
        Route::post('edit/{id}','CateController@postEdit');
        Route::get('delete/{id}','CateController@getDelete');
    });

    Route::group(['prefix'=>'product'], function(){
        Route::get('list','ProductController@getList');
        Route::get('add','ProductController@getAdd');
        Route::post('add','ProductController@postAdd');
        Route::get('edit/{id}','ProductController@getEdit');
        Route::post('edit/{id}','ProductController@postEdit');
        Route::get('delete/{id}','ProductController@getDelete');
        Route::post('delete-image/{id}','ProductController@postDeleteImage');
    });
    
    Route::group(['prefix'=>'user'],function(){
        Route::get('list','UserController@getList');
        Route::get('add','UserController@getAdd');
        Route::post('add','UserController@postAdd');
        Route::get('edit/{id}','UserController@getEdit');
        Route::post('edit/{id}','UserController@postEdit');
        Route::get('delete/{id}','UserController@getDelete');
    });

    Route::group(['prefix'=>'bill'],function(){
        Route::get('list','BillController@getList');
        Route::get('add','BillController@getAdd');
        Route::post('add','BillController@postAdd');
        Route::get('edit/{id}','BillController@getEdit');
        Route::post('edit/{id}','BillController@postEdit');
        Route::get('delete/{id}','BillController@getDelete');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('get-product-from-cate/{cateId}','AjaxController@getProductFromCate');
        Route::get('get-price-product/{productId}','AjaxController@getPriceProduct');
    });
});


