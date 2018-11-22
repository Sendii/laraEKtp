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

Route::get('/', function() {
	return view('welcome');
});
Route::resource('warga', 'WargaC');
Route::get('/signatures', 'WargaC@signature');
Route::get('{nik}/warga/cetak', 'WargaC@showWarga')->name('warga.showData');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
