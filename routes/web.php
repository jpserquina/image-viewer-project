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

Route::get('/', 'ImagesController@getImages');

Route::get('/id/{id}/{width}/{height}','ImagesController@viewImage');

Route::get('/view/{id}/{width}/{height}','ImagesController@show');

Route::get('/api/{id}/{width}/{height}','ImagesController@viewApiImage');

Route::get('/api','ImagesController@viewApi');

Route::get('/phpinfo', function () {
    return view('phpinfo');
});
