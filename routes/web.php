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
Auth::routes(['verify' => true]);


Route::prefix('admin')->group(function () {
	Route::prefix('theloai')->group(function () {
		//admin/theloai/add
		Route::get('add', 'TheLoaiController@getAdd');
		Route::post('add', 'TheLoaiController@postAdd')->name('addlist');

		Route::get('edit/{id}', 'TheLoaiController@getEdit');
		Route::post('edit/{id}', 'TheLoaiController@postEdit');

		Route::get('list', 'TheLoaiController@getList')->name('list');

		Route::get('delete/{id}', 'TheLoaiController@getDelete');
	});
});

Route::prefix('admin')->group(function () {
	Route::prefix('sach')->group(function () {
		//admin/theloai/add
		Route::get('add', 'SachController@getAdd');
		Route::post('add', 'SachController@postAdd')->name('addlist-book');

		Route::get('edit/{id}', 'SachController@getEdit');
		Route::post('edit/{id}', 'SachController@postEdit');

		Route::get('list', 'SachController@getList')->name('list-book');

		Route::get('delete/{id}', 'SachController@getDelete');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('test', 'SachController@Test');

Route::post('tim-kiem', 'SachController@search')->name('search');
