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
    return redirect('login');
});

Auth::routes();

//USER
Route::get('/home', 'HomeController@index')->name('home');
Route::get('pesan/{id}', 'PesanController@index');
Route::get('keranjang', 'PesanController@keranjang');
Route::get('edit_keranjang/{id}', 'PesanController@edit_keranjang');
Route::post('update_keranjang/{id}', 'PesanController@update_keranjang');
Route::post('pesan/{id}', 'PesanController@pesan');
Route::get('hapus/{id}', 'PesanController@hapus')->name('hapus');
Route::get('konfirmasi_user', 'PesanController@konfirmasi_user');


//ADMIN
Route::get('admin', 'AdminController@index');
Route::get('admin/detail/{id}', 'AdminController@detail');
Route::get('admin/konfirmasi_admin/{id}/{keterangan}', 'AdminController@konfirmasi_admin');
Route::get('admin/data', 'BarangController@index');
Route::post('admin/data/store', 'BarangController@store');
Route::get('admin/data/edit/{id}', 'BarangController@edit');
Route::post('admin/data/update', 'BarangController@update');
Route::get('admin/data/delete/{id}', 'BarangController@delete');