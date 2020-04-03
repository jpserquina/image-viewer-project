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

Route::get('/', 'ImagesController@index');

Route::get('/id/{id}/{width}/{height}','ImagesController@showRaw');

Route::get('/view/{id}/{width}/{height}','ImagesController@show');

Route::get('/api/id/{id}/{width}/{height}','ImageApiController@show');

Route::get('/api','ImageApiController@index')->name('api');

Route::get('/phpinfo', function () {
    return view('phpinfo');
});
