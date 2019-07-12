<?php

//Authentication
Route::group(['name' => 'authentication'], function () {
    Route::get('/enay', 'LoginController@showLogin')->name('login');
    Route::post('/login', 'LoginController@login')->name('sign');
    Route::get('/register', 'RegisterController@showRegister')->name('register');
    Route::post('/register', 'RegisterController@register')->name('signup');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

//Admin Page
Route::group(['name' => 'admin  '],function(){
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/{path}', "AdminController@index")->where('path', '([A-z\d\-\/_.]+)?');
});

Route::get('/', 'PropertiesController@index')->name('home');
Route::get('{path}', "PropertiesController@index")->where( 'path', '([A-z\d\-\/_.]+)?' );