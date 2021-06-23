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
use App\Models\User;

Route::get('/normal', 'Admin\ContactController@normal');
Route::get('/ajax', 'Admin\ContactController@ajax')->name('ajax');


Route::get('/login', 'HomeController@login')->name('login');

Route::resource('contacts', 'ContactController');


Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect("/");
});

Route::group(['middleware' => 'admin'],function() {

    Route::get('admin', 'HomeController@adminView')->name('admin');
    Route::get('/showEmergency','Admin\EmergenciesController@getEmergency')->name('showEmergency');

   Route::get('/showuser', 'Admin\UserController@user')->name('showuser');
   Route::get('/showrole', 'Admin\RoleController@role')->name('showrole');
   Route::get('/ShowReports','Admin\ReportsController@getReports')->name('get.reports');



});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
