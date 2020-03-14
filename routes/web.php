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
    return view('welcome');
});

Auth::routes();

// validasi harus sudah login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    // user edit with proses update  => namewebsite/profile/{nama user}
    Route::get('profile/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::patch('profile/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
});
