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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
	return view('home');
});

Route::get('/list-website/data', 'WebsiteController@index');
Route::get('/list-website/create', 'WebsiteController@create');
Route::post('/list-website/data', 'WebsiteController@addProses');
Route::get('/list-website/{id}', 'WebsiteController@edit');
Route::put('/list-website/{id}', 'WebsiteController@editProses');


Route::get('/jenis-website/data', 'JenisWebsiteController@data');