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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::put('/dashboard/updateExpired/{id}', 'HomeController@updateExpired')->name('updateExpired');

// route list website
Route::get('/list-website/data', 'WebsiteController@index')->name('list-website.data');
Route::get('/list-website/create', 'WebsiteController@create')->name('list-website.create');
Route::post('/list-website/data', 'WebsiteController@addProses')->name('list-website.addProses');
Route::get('/list-website/update/{id}', 'WebsiteController@edit')->name('list-website.edit');
Route::put('/list-website/editProses/{id}', 'WebsiteController@editProses')->name('list-website.editProses');
Route::delete('/list-website/delete/{id}', 'WebsiteController@delete')->name('list-website.delete');
Route::get('/list-website/detail/{id}', 'WebsiteController@detail')->name('list-website.detail');


Route::get('/list-website/webExpired/', 'WebsiteController@expiredWebsite');
Route::get('/countdown', 'WebsiteController@countdown');


//route jenis website
Route::get('/jenis-website/data', 'JenisWebsiteController@index')->name('jenis-website.data');
Route::get('/jenis-website/create', 'JenisWebsiteController@create')->name('jenis-website.create');
Route::post('/jenis-website/addProses', 'JenisWebsiteController@addProses')->name('jenis-website.addProses');
Route::get('/jenis-website/edit/{id}', 'JenisWebsiteController@edit')->name('jenis-website.edit');
Route::put('/jenis-website/edit/{id}', 'JenisWebsiteController@editProses')->name('jenis-website.editProses');
Route::delete('/jenis-website/edit/{id}', 'JenisWebsiteController@delete')->name('jenis-website.delete');


//route pelanggan
Route::get('/pelanggan/data', 'PelangganController@index')->name('pelanggan.data');
Route::get('/pelanggan/create', 'PelangganController@create')->name('pelanggan.create');
Route::post('/pelanggan/addProses', 'PelangganController@addProses')->name('pelanggan.addProses');
Route::get('/pelanggan/edit/{id}', 'PelangganController@edit')->name('pelanggan.edit');
Route::put('/pelanggan/editProses/{id}', 'PelangganController@editProses')->name('pelanggan.editProses');
Route::delete('/pelanggan/delete/{id}', 'PelangganController@delete')->name('pelanggan.delete');