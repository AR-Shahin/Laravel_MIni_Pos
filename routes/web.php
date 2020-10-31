<?php

use Illuminate\Support\Facades\Route;


//Login Routes
Route::get('login','Auth\LoginController@index')->name('login');
Route::post('login','Auth\LoginController@LoginProcess');

//Auth MIDDLEWARE
Route::group(['middleware' => 'auth'], function() {
Route::get('logout','Auth\LoginController@Logout');
//Dashboard Routes
Route::get('/','DashboardController@index');

//UserGroup Routes
Route::get('user.groups','UserGroupsController@groups');
Route::post('user.groups','UserGroupsController@store');
Route::post('group.edit/{id}','UserGroupsController@update');
Route::get('group.destroy/{id}','UserGroupsController@destroy');

//User Routes
Route::resource('users', 'UserController' );

//User sales Routes
Route::get('users/{id}/sales','UserSalesController@index')->name('user.sales');
Route::post('users/{id}/invoices','UserSalesController@createInvoice')->name('user.sales.store');
Route::delete('users/{id}/invoices/{invoice_id}','UserSalesController@destroy')->name('user.sales.destroy');

//--invoice||sale
Route::get('users/{id}/invoices/{invoice_id}', 'UserSalesController@invoice')->name('user.sales.invoice_details');
Route::post('users/{id}/invoices/{invoice_id}','UserSalesController@addItem')->name('user.sales.invoices.add_item');
Route::delete('users/{id}/invoices/{invoice_id}/{item_id}', 'UserSalesController@destroyItem')->name('user.sales.invoices.delete_item');

//User Purchases Routes
Route::get('users/{id}/purchase','UserPurchaseController@index')->name('user.purchase');

//User Payment Routes
Route::get('users/{id}/payment','UserPaymentController@index')->name('user.payment');
Route::post('users/{id}/payment','UserPaymentController@store')->name('user.payment.store');
Route::delete('users/{id}/payments/{payment_id}', 	'UserPaymentController@destroy')->name('user.payments.destroy');

//User Receipt Routes
Route::get('users/{id}/receipt','UserReceiptController@index')->name('user.receipt');
Route::post('users/{id}/receipt','UserReceiptController@store')->name('user.receipt.store');
Route::delete('users/{id}/receipts/{receipt_id}', 	'UserReceiptController@destroy')->name('user.receipts.destroy');




//Category Routes
Route::resource('category', 'CategoryController',['except' => ['show','edit','create']] );
//Product Routes
Route::resource('product', 'ProductController',['except' => ['show','edit','create']] );
});



