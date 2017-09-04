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
Route::get('/','Inventory\DashboardController@getLogin');
Route::group(['namespace'=>'Inventory'],function(){
	Route::get('admin','DashboardController@getLogin');
	Route::post('admin','DashboardController@postLogin');
	Route::get('admin/dashboard','DashboardController@index');
	Route::get('admin/logout','DashboardController@getLogout');

	Route::resource('admin/vendor','VendorController');
	Route::resource('admin/product-category','ProductCategoryController');
	Route::resource('admin/unit','UnitController');
});
// Route::get('/', function () {
//     return view('welcome');
// });
