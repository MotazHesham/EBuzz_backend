<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 



Route::group(['prefix' => 'v1/user', 'as' => 'api.', 'namespace' => 'Api\V1\User', 'middleware' => 'changelanguage'], function () {

    Route::post('register','UserAuthApiController@register');
    Route::post('login','UserAuthApiController@login');
    
    Route::group(['middleware' => ['auth:sanctum']],function () {
        //routes for adding contacts and delete it
    Route ::group(['prefix' =>'contact'],function(){
    Route::post('add','ContactsApiController@addContact') ;       
    Route::get('delete/{contact_id}','ContactsApiController@deleteContact') ;
   });
   Route ::group(['prefix' =>'report'],function(){
    Route::post('add','ReportsApiController@addReport') ;       
 
   });
        
    });
});

