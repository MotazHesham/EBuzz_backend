<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 



Route::group(['prefix' => 'v1/admin', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => 'changelanguage'], function () {

    Route::group(['middleware' => ['auth:sanctum']],function () {
        
    });

});

