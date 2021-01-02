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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [
//     'as'=>'trangchu',
//     'uses'=>'App\Http\Controllers\PageController@getIndex'
// ]);

Route::redirect('/', 'trang-chu');

Route::get('trang-chu', [
    'as'=>'trangchu',
    'uses'=>'App\Http\Controllers\PageController@getIndex'
]);

Route::get('dang-nhap', [
    'as'=>'dangnhap',
    'uses'=>'App\Http\Controllers\PageController@getDangNhap'
]);
Route::post('dang-nhap', [
    'as'=>'dangnhap',
    'uses'=>'App\Http\Controllers\PageController@postDangNhap'
]);

Route::get('dang-ky', [
    'as'=>'dangky',
    'uses'=>'App\Http\Controllers\PageController@getDangKy'
]);

Route::post('dang-ky', [
    'as'=>'dangky',
    'uses'=>'App\Http\Controllers\PageController@postDangKy'
]);

Route::get('dang-xuat', [
    'as'=>'dangxuat',
    'uses'=>'App\Http\Controllers\PageController@postDangXuat'
]);

Route::get('loai-san-pham/{type}', [
    'as'=>'loaisanpham',
    'uses'=>'App\Http\Controllers\PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}', [
    'as'=>'chitietsanpham',
    'uses'=>'App\Http\Controllers\PageController@getChiTietSp'
]);

// Route::get('chi-tiet-san-pham-popup/{id}', [
//     'as'=>'chitietsanphampopup',
//     'uses'=>'App\Http\Controllers\PageController@getChiTietSpPopup'
// ]);

// Route::resource('/employee','EmployeeController');

Route::get('modal-chi-tiet-san-pham/{id}', [
    'as'=>'modalchitietsanpham',
    'uses'=>'App\Http\Controllers\PageController@getModalChiTietSp'
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

Route::get('add-to-cart/{id}', [
    'as'=>'themgiohang',
    'uses'=>'App\Http\Controllers\PageController@getAddtoCart'
]);

Route::get('del-to-cart/{id}', [
    'as'=>'xoagiohang',
    'uses'=>'App\Http\Controllers\PageController@getDeltoCart'
]);

Route::get('dat-hang', [
    'as'=>'dathang',
    'uses'=>'App\Http\Controllers\PageController@getCheckout'
]);

Route::post('dat-hang', [
    'as'=>'dathang',
    'uses'=>'App\Http\Controllers\PageController@postCheckout'
]);

Route::get('tim-kiem', [
    'as'=>'timkiem',
    'uses'=>'App\Http\Controllers\PageController@getTimKiem'
]);

// Route::get('index','PageController@getIndex');

