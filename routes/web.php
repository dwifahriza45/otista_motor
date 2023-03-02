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
});

Route::group(['middleware' => ['auth', 'ceklevel:2']], function () {
    //User
    Route::get('/home', 'HomeController@index')->name('homeUser');
    Route::get('/service', 'ServiceController@index')->name('serviceUser');
    Route::get('/notifikasi', 'NotifikasiController@index')->name('notifikasi');

    Route::get('/profile', 'ProfileController@index')->name('profileUser');
    Route::post('/profile', 'ProfileController@update')->name('profileUser');


    Route::get('/motor', 'MotorController@index')->name('motor');
    Route::get('/ubah/password', 'UbahPasswordController@index')->name('ubahPassword');
    Route::post('/ubah/password', 'UbahPasswordController@changePassword')->name('ubahPassword');
});

Route::group(['middleware' => ['auth', 'ceklevel:1']], function () {
    // admin
    Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/admin/sparepart', 'AdminController@sparepart')->name('sparepart');
    Route::get('/admin/service', 'AdminController@service')->name('service');
    Route::get('/admin/pelanggan', 'AdminController@pelanggan')->name('pelanggan');
    Route::get('/admin/data', 'AdminController@dataAdmin')->name('dataAdmin');

    Route::get('/admin/profile', 'AdminController@profileAdmin')->name('profileAdmin');
    Route::post('/admin/profile', 'ProfileController@updateAdmin')->name('profileAdmin');

    Route::get('/admin/ubah/password', 'AdminController@ubahPasswordAdmin')->name('ubahPasswordAdmin');
    Route::post('/admin/ubah/password', 'UbahPasswordController@changePassword')->name('ubahPasswordAdmin');
});