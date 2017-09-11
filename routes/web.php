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
	Route::get('admin/product-stock/list/{product_id}','ProductStockController@index');
	Route::get('admin/product-stock/create','ProductStockController@createStock');
	Route::post('admin/product-stock/store','ProductStockController@storeStock');
	Route::get('admin/product-stock/edit/{product_id}','ProductStockController@editStock');
	Route::get('admin/product-stock/edit-stock/{stock_id}','ProductStockController@editEachStock');
	Route::post('admin/product-stock/update-stock/{stock_id}','ProductStockController@updateEachStock');
	Route::post('admin/product-stock/update/{product_id}','ProductStockController@updateStock');
	Route::delete('admin/product-stock/destroy/{stock_id}','ProductStockController@destroyStock');

	Route::resource('admin/vendor','VendorController');
	Route::resource('admin/product-category','ProductCategoryController');
	Route::resource('admin/unit','UnitController');
	Route::resource('admin/product','ProductController');
	Route::get('admin/order','OrderController@index');
	Route::get('admin/order/create','OrderController@create');
	Route::get('admin/order/get-products-by-ajax','OrderController@getProductListsByAjax');
	Route::post('admin/order/store','OrderController@store');
	Route::get('admin/order/edit/{id}','OrderController@edit');
	Route::post('admin/order/update/{id}','OrderController@update');
	Route::get('admin/order/print/{id}','OrderController@getOrderPrint');
	Route::get('admin/order/pending-order','OrderController@getPendingOrder');
	Route::get('admin/order/completed-order','OrderController@getCompletedOrder');
	Route::get('admin/order/cancel-order','OrderController@getCancelOrder');
	// Route::resource('admin/product-stock','ProductStockController');
});
// Route::get('/', function () {
//     return view('welcome');
// });
