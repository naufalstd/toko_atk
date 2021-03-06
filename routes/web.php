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

Route::group(['middleware' => 'auth'], function() {
//USER

// Route::get('/', function () {
//     return view('dashboard');
// });

//routing protecting

Route::get('daftar', 'AdminController@user');
Route::post('daftar/user', 'AdminController@tambah_user');
Route::get('delete/{id}', 'AdminController@hapus_user');
Route::get('edit/{id}', 'AdminController@show_edituser');
Route::post('edituser', 'AdminController@edit_user');
Route::get('password/{id}', 'AdminController@password');
Route::get('ubah_password', 'AdminController@gantipassword');
Route::post('ubahpassword', 'AdminController@ubahpassword');



Route::get('/', 'DashboardController@dashboard');



Route::get('hapus/{id}', 'PesanController@hapus')->name('hapus');
Route::get('barang', 'PesanController@barang');

Route::get('categori', 'PesanController@barang');
Route::get('categori/{id}', 'PesanController@categori_getid');

Route::get('keranjang/{id}', 'PesanController@categori_getid');
Route::get('keranjang', 'PesanController@keranjang');
Route::get('edit_keranjang/{id}', 'PesanController@edit_keranjang');
Route::post('update_keranjang/{id}', 'PesanController@update_keranjang');

Route::get('pesanan', 'PesanController@pesanan');
Route::get('pesan/{id}', 'PesanController@index');
Route::post('pesan/{id}', 'PesanController@pesan');

Route::get('konfirmasi_selesai/{id}', 'PesanController@konfirmasi_selesai');
Route::get('konfirmasi_user', 'PesanController@konfirmasi_user');
Route::get('konfirmasi_atasan', 'PesanController@konfirmasi_atasan');




//ADMIN

Route::get('admin', 'AdminController@index');
Route::get('admin/detail/{id}', 'AdminController@detail');
Route::get('admin/invoice/{id}', 'AdminController@invoice');
Route::get('admin/konfirmasi_admin/{id}/{keterangan}', 'AdminController@konfirmasi_admin');
Route::get('admin/detail/edit', 'AdminController@edit_pesanan');
Route::post('admin/update_pesanan/{id}', 'AdminController@update_pesanan');
Route::post('admin/biaya', 'AdminController@biaya');
Route::get('admin/dana', 'AdminController@dana');
Route::post('admin/dana/update', 'AdminController@update_dana');


//ADMIN YANG BERKAITAN DENGAN BARANG
Route::get('admin/data', 'BarangController@index'); //tampilan utama 
Route::post('admin/data/store', 'BarangController@store'); //buat nambah data
Route::get('admin/data/edit/{id}', 'BarangController@edit'); //tampilan edit
Route::post('admin/data/update', 'BarangController@update'); //mengupdate database barang
Route::get('admin/data/delete/{id}', 'BarangController@delete'); //hapus barang
});

//ADMIN TAMBAH KATEGORI
Route::post('admin/data/tambah_kategori', 'AdminController@tambah_kategori'); //buat nambah data
Route::get('kategori', 'AdminController@kategori');
Route::get('kategori/edit/{id}', 'AdminController@edit_kategori');
Route::post('Update_kategori', 'AdminController@update_kategori');
Route::get('kategori/delete/{id}', 'AdminController@hapus_kategori');

Auth::routes();

