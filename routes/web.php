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
    return view('welcome');
});

Route::get('trang-chu', [
    'as'=>'trangchu',
    'uses'=>'App\Http\Controllers\PageController@getIndex'
]);

Route::get('loai-san-pham', [
    'as'=>'loaisanpham',
    'uses'=>'App\Http\Controllers\PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham', [
    'as'=>'chitietsanpham',
    'uses'=>'App\Http\Controllers\PageController@getChiTietSp'
]);

Route::get('lien-he', [
    'as'=>'lienhe',
    'uses'=>'App\Http\Controllers\PageController@getLienHe'
]);

Route::get('gio-hang', [
    'as'=>'giohang',
    'uses'=>'App\Http\Controllers\PageController@getGioHang'
]);

Route::get('thanh-toan', [
    'as'=>'thanhtoan',
    'uses'=>'App\Http\Controllers\PageController@getThanhToan'
]);

Route::get('gioi-thieu', [
    'as'=>'gioithieu',
    'uses'=>'App\Http\Controllers\PageController@getGioiThieu'
]);

Route::get('error', [
    'as'=>'error',
    'uses'=>'App\Http\Controllers\PageController@getError'
]);

Route::get('faq', [
    'as'=>'faq',
    'uses'=>'App\Http\Controllers\PageController@getFaq'
]);

// Route::get('index','PageController@getIndex');

