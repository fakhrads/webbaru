<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

// validasi harus sudah login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/api-documentation', 'HomeController@apidoc')->name('apidoc');
    Route::post('/profile/update/email', 'UserController@email')->name('update-email');
    Route::post('/profile/update/password', 'UserController@password')->name('update-password');
    Route::post('/profile/update/apikey', 'UserController@apikey')->name('update-apikey');
    Route::patch('/profile',  'UserController@update');
});

//Route untuk API

Route::get('/cuaca','ApiController@cuaca');
Route::get('/corona','ApiController@corona');