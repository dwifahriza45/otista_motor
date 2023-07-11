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
    return view('landing');
});

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware('guest')->group(function () {
    //User
    Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@index']);
    Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@authUser']);

    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@store')->name('register');

    // Admin
    Route::get('/login/admin', 'LoginController@admin')->name('loginAdmin');
    Route::post('/login/admin', 'LoginController@postLogin')->name('loginAdmin');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/unduh/kwitansi/{id}', 'UnduhKwitansiController@index')->name('unduhKwitansi');
});

Route::group(['middleware' => ['auth', 'ceklevel:2']], function () {
    //User
    Route::get('/home', 'HomeController@index')->name('homeUser');

    Route::get('/service', 'ServiceController@index')->name('serviceUser');
    Route::post('/service', 'ServiceController@createService')->name('createService');

    Route::post('/service/batal/{id}', 'ServiceController@batal_user')->name('batal_user');
    Route::get('/service/motor/{id}', 'ServiceController@penyerahanMotor')->name('penyerahanMotor');

    Route::get('/notifikasi', 'NotifikasiController@index')->name('notifikasi');

    Route::get('/profile', 'ProfileController@index')->name('profileUser');
    Route::post('/profile', 'ProfileController@update')->name('profileUser');


    Route::get('/motor', 'MotorController@index')->name('motor');
    Route::get('/motor/tambah', 'MotorController@motor')->name('getMotor');
    Route::post('/motor/tambah', 'MotorController@create')->name('addMotor');
    Route::get('/motor/ubah/{id}', 'MotorController@updateMotor')->name('updateMotor');
    Route::post('/motor/ubah/{id}', 'MotorController@update')->name('updateMotor');
    Route::get('/motor/hapus/{id}', 'MotorController@delete')->name('hapusMotor');

    Route::get('/ubah/password', 'UbahPasswordController@index')->name('ubahPassword');
    Route::post('/ubah/password', 'UbahPasswordController@changePassword')->name('ubahPassword');

    Route::get('/transaksi/selesai', 'CompleteTransController@index')->name('CompTrans');
});

Route::group(['middleware' => ['auth', 'ceklevel:1']], function () {
    // admin
    Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');

    Route::get('/admin/kategori/sparepart', 'AdminController@kategoriSparepart')->name('kategoriSparepart');
    Route::get('/admin/kategori/sparepart/tambah', 'KategoriSparepartController@index')->name('addKategoriSparepart');
    Route::post('/admin/kategori/sparepart/tambah', 'KategoriSparepartController@addSparepart')->name('addKategoriSparepart');
    Route::get('/admin/kategori/sparepart/ubah/{id}', 'KategoriSparepartController@updateKategoriSparepart')->name('updateKategoriSparepart');
    Route::post('/admin/kategori/sparepart/ubah/{id}', 'KategoriSparepartController@update')->name('updateKategoriSparepart');
    Route::get('/admin/kategori/sparepart/delete/{id}', 'KategoriSparepartController@delete')->name('hapusKategoriSparepart');

    Route::get('/admin/sparepart', 'AdminController@sparepart')->name('sparepart');
    Route::get('/admin/sparepart/tambah', 'SparepartController@index')->name('addSparepart');
    Route::post('/admin/sparepart/tambah', 'SparepartController@addSparepart')->name('addSparepart');
    Route::get('/admin/sparepart/ubah/{id}', 'SparepartController@updateSparepart')->name('updateSparepart');
    Route::post('/admin/sparepart/ubah/{id}', 'SparepartController@update')->name('updateSparepart');
    Route::get('/admin/sparepart/delete/{id}', 'SparepartController@delete')->name('hapusSparepart');
    Route::get('/admin/sparepart/active/{id}', 'SparepartController@active')->name('AktifSparepart');
    Route::get('/admin/sparepart/nonaktif/{id}', 'SparepartController@nonaktif')->name('NonaktifSparepart');


    Route::get('/admin/service', 'AdminController@service')->name('service');
    Route::get('/admin/service/{id}', 'ServiceController@approve_admin')->name('approve_admin');
    Route::post('/admin/service/reject/{id}', 'ServiceController@reject_admin')->name('reject_admin');
    Route::post('/admin/service/input/harga/{id}', 'ServiceController@hargaJasa')->name('inputHargaJasa');
    Route::post('/admin/service/input/jadwal/{id}', 'ServiceController@jadwalkan')->name('inputJadwal');
    Route::get('/admin/service/queue/{id}', 'ServiceController@inputQueue')->name('inputQueue');
    Route::get('/admin/service/repair/{id}', 'ServiceController@inputRepair')->name('inputRepair');
    Route::get('/admin/service/repair/done/{id}', 'ServiceController@inputRepairDone')->name('inputRepairDone');
    Route::get('/admin/service/repair/done/transaksi/{id}', 'ServiceController@inputDone')->name('inputDone');

    Route::get('/admin/pelanggan', 'AdminController@pelanggan')->name('pelanggan');

    Route::get('/admin/data', 'AdminController@dataAdmin')->name('dataAdmin');
    Route::get('/admin/data/create', 'AdminController@tambahAdmin')->name('tambahAdmin');
    Route::post('/admin/data/create', 'AdminController@store')->name('tambahAdmin');
    Route::get('/admin/data/delete/{id}', 'AdminController@delete')->name('hapusAdmin');

    Route::get('/admin/profile', 'AdminController@profileAdmin')->name('profileAdmin');
    Route::post('/admin/profile', 'ProfileController@updateAdmin')->name('profileAdmin');

    Route::get('/admin/ubah/password', 'AdminController@ubahPasswordAdmin')->name('ubahPasswordAdmin');
    Route::post('/admin/ubah/password', 'UbahPasswordController@changePassword')->name('ubahPasswordAdmin');

    Route::get('/admin/transaksi/selesai', 'CompleteTransController@transAdmin')->name('CompTransAdmin');

    Route::get('/unduh/sparepart', 'UnduhKwitansiController@unduhSparepart')->name('unduhSparepart');
    Route::get('/unduh/service', 'UnduhKwitansiController@unduhDataService')->name('unduhDataService');
    Route::get('/unduh/transaksi', 'UnduhKwitansiController@unduhDataTransaksiSelesai')->name('unduhDataTransaksiSelesai');
    Route::get('/unduh/pelanggan', 'UnduhKwitansiController@unduhDataPelanggan')->name('unduhDataPelanggan');
    Route::get('/unduh/admin', 'UnduhKwitansiController@unduhDataAdmin')->name('unduhDataAdmin');
});