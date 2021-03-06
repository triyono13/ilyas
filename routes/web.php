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
    return redirect('/index');
});

Auth::routes();
Route::get('logout', 'QovexController@logout');

Route::get('pages-login', 'QovexController@index');
Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
Route::get('pages-register-2', 'QovexController@index');
Route::get('pages-recoverpw', 'QovexController@index');
Route::get('pages-recoverpw-2', 'QovexController@index');
Route::get('pages-lock-screen', 'QovexController@index');
Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-comingsoon', 'QovexController@index');
Route::post('login-status', 'QovexController@checkStatus');


// You can also use auth middleware to prevent unauthenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('/reseller', 'ResellerController');
    Route::resource('/agen', 'AgenController');
    Route::resource('/gudang', 'GudangController');
    Route::resource('/gudangagen', 'GudangAgenController');
    Route::resource('/transaksi', 'TransaksiController');
    Route::resource('/transaksiagen', 'TransaksiAgenController');
    Route::get('/ganti', 'ChangeController@index')->name('ganti');
    Route::post('/ganti', 'ChangeController@store')->name('change');
    Route::get('/findPrice','TransaksiController@findPrice');
    Route::get('/findHarga','TransaksiAgenController@findHarga');
});