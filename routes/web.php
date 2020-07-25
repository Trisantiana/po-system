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
	return view('dashboard');
});

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

// route list website
Route::get('/list-website/data', 'WebsiteController@index')->name('list-website.data');
Route::get('/list-website/create', 'WebsiteController@create')->name('list-website.create');
Route::post('/list-website/data', 'WebsiteController@addProses')->name('list-website.addProses');
Route::get('/list-website/update/{id}', 'WebsiteController@edit')->name('list-website.edit');
Route::put('/list-website/editProses/{id}', 'WebsiteController@editProses')->name('list-website.editProses');
Route::delete('/list-website/delete/{id}', 'WebsiteController@delete')->name('list-website.delete');

Route::get('/list-website/webExpired', 'WebsiteController@expiredWebsite');


Route::get('/jenis-website/data', 'JenisWebsiteController@data');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
