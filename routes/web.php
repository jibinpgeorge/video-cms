<?php

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

Route::get('home', function () {
    return redirect('/');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/video/{slug}/{id}', 'HomeController@video');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/upload', 'UploadController@getIndex')->name('upload');
    Route::post('/upload', 'UploadController@postIndex');
});
