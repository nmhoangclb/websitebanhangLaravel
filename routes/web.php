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

//Route::get('trangchu', 'PagesController@getIndex');

Route::get('trangchu', [
	'as' => 'trang-chu',
	'uses' => 'PagesController@getIndex',
]);

Route::get('loai-san-pham/{type}', [
	'as' => 'loaisanpham',
	'uses' => 'PagesController@getLoaiSP',
]);

Route::get('chi-tiet-san-pham/{id}', [
	'as' => 'chitietsanpham',
	'uses' => 'PagesController@getChiTietSP',
]);

Route::get('tim-kiem', [
	'as' => 'timkiem',
	'uses' => 'PagesController@getTimKiem',
]);

Route::get('thanh-toan', [
	'as' => 'thanhtoan',
	'uses' => 'PagesController@getThanhToan',
]);

Route::get('check-out', [
	'as' => 'checkout',
	'uses' => 'PagesController@getCheckOut',
]);
Route::post('check-out', [
	'as' => 'checkout',
	'uses' => 'PagesController@postCheckOut',
]);

Route::get('xac-nhan/{id}', [
	'as' => 'xacnhan',
	'uses' => 'PagesController@getXacNhan',
]);

Route::get('lien-he', [
	'as' => 'lienhe',
	'uses' => 'PagesController@getLienHe',
]);

Route::get('gioi-thieu', [
	'as' => 'gioithieu',
	'uses' => 'PagesController@getGioiThieu',
]);

Route::get('add-to-cart/{id}', [
	'as' => 'themgiohang',
	'uses' => 'PagesController@getAddtoCart',
]);

Route::get('del-cart/{id}', [
	'as' => 'xoagiohang',
	'uses' => 'PagesController@getDelItemCart',
]);
