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

Route::get('/', function () {
    return view('home.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //разобраться с директом и админкой
Route::group(['middleware' => 'role:admin'], function() {

    Route::get('/home.welcome', function() {
        return 'Добро пожаловать, Admin';
    });
});
