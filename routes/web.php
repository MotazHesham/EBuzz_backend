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

Route::resource('contacts', 'ContactController');




Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    $user = User::find(auth()->user()->id);
    $user ->login_status = 0;
    $user->save();
    Auth::logout();
    return redirect("/");
});

Route::group(['middleware' => 'admin'],function() {

    Route::get('admin', 'HomeController@adminView')->name('admin');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
