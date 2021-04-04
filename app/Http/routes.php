<?php

Route::group(['prefix' => 'admin','namespace'=>'admin',"middleware"=>"auth"], function () {  
Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::resource('/category', 'CategoryController');
Route::resource('/post', 'PostController');
Route::get('/post-search', 'PostController@search')->name('admin.post.search');
Route::resource('/order', 'OrderController');
Route::get('/order-search', 'OrderController@search')->name('admin.order.search');
Route::get('/order-new', 'OrderController@newOrder')->name('admin.order.neworder');
Route::get('/customer', 'OrderController@customer')->name('admin.order.customer');
Route::resource('/brandproduct','BrandProductController');
Route::resource('/contact','ContactController');
Route::resource('/featuredproduct','FeaturedProductController');
Route::resource('/bestseller','BestSellerController');
});
Route::group(['namespace'=>'user'], function () {
    Route::get('/','HomeController@index')->name('user.index');
    Route::get('/product','HomeController@product')->name('user.product');
    Route::post('/product','HomeController@productGetSorting')->name('user.productGetSorting');
    Route::get('/product/sortby/{sortby}','HomeController@productSortBy')->name('user.productSortBy');
    Route::get('/about','HomeController@about')->name('user.about');
    Route::get('/contact','HomeController@contact')->name('user.contact');
    Route::post('/contact','HomeController@contactus')->name('user.contactus');
    Route::get('/product/{id}','HomeController@productDetails')->name('user.productdetail');
    Route::get('/404','HomeController@e404')->name('user.404');
    Route::get('/order/{id}','CartController@orderTemp')->name('user.orderTemp');
    Route::get('/order','CartController@order')->name('user.order');
    Route::get('/orderremove/{id}','CartController@orderRemove')->name('user.orderremove');
    Route::post('/order-complete','CartController@orderSubmit')->name('user.ordercomplete');
});
Route::auth();

Route::get('/home', 'HomeController@index');