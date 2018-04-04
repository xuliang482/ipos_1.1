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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('home', 'HomeController@index');
    
    Route::resource('products', 'ProductsController');
    Route::resource('customers', 'Backend\CustomersController');
    Route::resource('users', 'UsersController');
    Route::resource('suppliers', 'SuppliersController');
    Route::resource('stores', 'StoresController');
    Route::resource('stocks', 'StocksController');
    Route::resource('orders', 'OrdersController');
    Route::resource('refunds', 'RefundsController');
    
    Route::get('/db-backup', array('as' => 'db-backup', 'uses' => 'UsersController@dbBackup'));
    
});