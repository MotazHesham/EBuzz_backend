<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'v1/user', 'as' => 'api.', 'namespace' => 'Api\V1\User', 'middleware' => 'changelanguage'], function () {

    Route::post('register','UserAuthApiController@register');
    Route::post('login','UserAuthApiController@login');
    Route::post('check-phone-exist','UserAuthApiController@check_phone_exist');

    Route::group(['middleware' => ['auth:sanctum']],function () {

        Route::post('fcm-token','UsersApiController@update_fcm_token');

        // contacts
        Route::group(['prefix' =>'contact'],function(){
            Route::post('add','ContactsApiController@store') ;
            Route::get('delete/{contact_id}','ContactsApiController@delete') ;
            Route::get('view','ContactsApiController@view') ;
            Route::get('sms','ContactsApiController@sms') ;
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
            Route::get('activity','EmergenciesApiController@activity') ;
            Route::get('start','EmergenciesApiController@start') ;
        });

        //notifications
        Route::group(['prefix' =>'notifications'],function(){
            Route::get('/','NotificationsAPiController@user_notifications');
        });

        //user profile
        Route::group(['prefix' =>'profile'],function(){
            Route::get('/','UsersApiController@profile');
            Route::post('update','UsersApiController@update');
            Route::post('update_sms_alert','UsersApiController@update_sms_alert');
        });

        //cities
        Route::group(['prefix' =>'cities'],function(){
            Route::get('view','CityApiController@index');

        });
        
        //users
        Route::group(['prefix' =>'users'],function(){
            Route::get('all','UsersApiController@users');

        });

                //post
                Route::group(['prefix' =>'posts'],function(){

                    Route::post('create','PostController@create');
                    Route::post('update','PostController@update');
                    Route::get('delete/{post_id}','PostController@delete');


                });
    });
});



