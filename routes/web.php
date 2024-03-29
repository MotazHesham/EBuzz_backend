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

Route::resource('contacts', 'ContactController');


Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect("/");
});

Route::group(['middleware' => 'admin'],function() {

    Route::get('admin', 'HomeController@dashboard')->name('admin');
    Route::get('/showEmergency','Admin\EmergenciesController@getEmergency')->name('showEmergency');

    Route::get('/cities','HomeController@cities')->name('cities');

    Route::get('/showuser', 'Admin\UserController@user')->name('showuser');
    Route::get('/showrole', 'Admin\RoleController@role')->name('showrole');
    Route::get('/ShowReports','Admin\ReportsController@getReports')->name('get.reports'); 
    Route::get('toggle/block/{id}','Admin\UserController@toggle_block')->name('toggle.block');

    Route::post('partials/reports','Admin\UserController@reports_partial')->name('partials.users_reports');

    Route::get('/posts', 'Admin\PostsController@posts')->name('posts');
    Route::get('/posts/change_status/{id}/{status}', 'Admin\PostsController@change_status')->name('posts.change_status');

});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
