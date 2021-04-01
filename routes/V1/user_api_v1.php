<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 



Route::group(['prefix' => 'v1/user', 'as' => 'api.', 'namespace' => 'Api\V1\User', 'middleware' => 'changelanguage'], function () {

    Route::post('register','UserAuthApiController@register');
    Route::post('login','UserAuthApiController@login');
    
    Route::group(['middleware' => ['auth:sanctum']],function () {

        // contacts
        Route::group(['prefix' =>'contact'],function(){
            Route::post('add','ContactsApiController@store') ;       
            Route::get('delete/{contact_id}','ContactsApiController@delete') ;
        });

        // reports
        Route::group(['prefix' =>'report'],function(){
            Route::get('index','ReportsApiController@index') ;        
            Route::post('add','ReportsApiController@store') ;        
        });

        // location
        Route::group(['prefix' =>'location'],function(){
            Route::post('update','UsersApiController@update_location') ;        
        });

        //emergencies
        Route::group(['prefix' =>'emergencies'],function(){
            Route::get('history','EmergenciesApiController@history') ;        
        });

    });
});

