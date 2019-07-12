<?php

Route::group(['middleware' => 'auth:api'], function(){
    Route::apiResources(['user' => 'API\UserController']);
    Route::apiResources(['property' => 'API\PropertiesController']);
    Route::apiResources(['contact' => 'API\ContactController']);
    Route::apiResources(['office' => 'API\OfficeController']);
    Route::get('property/details/{id}', 'API\PropertiesController@details');
    Route::get('owner', 'API\UserController@owner');
});