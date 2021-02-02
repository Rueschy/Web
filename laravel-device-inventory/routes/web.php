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

/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/', 'LocationController@index')->name('index');

Route::get('/details/{location}', 'LocationController@edit')->name('location.details');
Route::get('/delete/{location}', 'LocationController@destroy')->name('location.destroy');
Route::post('/details/update/{location}', 'LocationController@update')->name('location.update');
Route::get('/details/remove/{device}', 'DeviceController@remove')->name('device.remove');
Route::get('/devices', 'DeviceController@index')->name('devices.index');
Route::get('/devices/details/{device}', 'DeviceController@edit')->name('device.details');
Route::post('/devices/details/update/{device}', 'DeviceController@update')->name('device.update');
Route::get('/devices/delete/{device}', 'DeviceController@destroy')->name('device.destroy');
