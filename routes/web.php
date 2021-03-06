<?php

use Illuminate\Support\Facades\Route;


//Login Routes
Route::get('login','Auth\LoginController@index')->name('login');
            Route::post('login','Auth\LoginController@LoginProcess');

//Auth MIDDLEWARE
Route::group(['middleware' => 'auth'], function() {
Route::get('logout','Auth\LoginController@Logout');
//Dashboard Routes
Route::get('/','DashboardController@index')->name('dashboard');

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
Route::post('users/{id}/purchase','UserPurchaseController@createInvoice')->name('user.purchase.store');
Route::delete('users/{id}/purchase/{invoice_id}','UserPurchaseController@destroy')->name('user.purchase.destroy');

    Route::get('users/{id}/purchase/{invoice_id}', 'UserPurchaseController@invoice')->name('user.purchase.invoice_details');
    Route::post('users/{id}/purchase/{invoice_id}','UserPurchaseController@addItem')->name('user.purchase.invoices.add_item');
    Route::delete('users/{id}/purchase/{invoice_id}/{item_id}', 'UserPurchaseController@destroyItem')->name('user.purchase.invoices.delete_item');

//User Payment Routes
Route::get('users/{id}/payment','UserPaymentController@index')->name('user.payment');
Route::post('users/{id}/payment/{invoice_id?}','UserPaymentController@store')->name('user.payment.store');
Route::delete('users/{id}/payments/{payment_id}', 	'UserPaymentController@destroy')->name('user.payments.destroy');

//User Receipt Routes
Route::get('users/{id}/receipt','UserReceiptController@index')->name('user.receipt');
Route::post('users/{id}/receipt/{invoice_id?}','UserReceiptController@store')->name('user.receipt.store');
Route::delete('users/{id}/receipts/{receipt_id}', 	'UserReceiptController@destroy')->name('user.receipts.destroy');

//user Reports
    Route::get('users/{id}/reports','UserReportsController@index')->name('user.reports');

//Category Routes
Route::resource('category', 'CategoryController',['except' => ['show','edit','create']] );
//Product Routes
Route::resource('product', 'ProductController',['except' => ['show','edit','create']] );
//Stock Route
Route::get('stock','ProductStockController@index')->name('stock');
//Report Routes
Route::get('reports/sales','Reports\SalesReportController@index')->name('reports.sales');
Route::get('reports/purchases','Reports\PurchaseReportController@index')->name('reports.purchases');
Route::get('reports/payments','Reports\PaymentReportController@index')->name('reports.payments');
Route::get('reports/receipts','Reports\ReceiptReportController@index')->name('reports.receipts');
Route::get('reports/profits','Reports\ProfitReportController@index')->name('reports.profits');
Route::get('reports/days','Reports\DayReportController@index')->name('reports.days');


//Admins Routes
    Route::get('admin/profile','Auth\AdminController@index')->name('admin.profile');
    Route::get('admin/update','Auth\AdminController@update')->name('admin.update');
    Route::post('admin/update','Auth\AdminController@updateProfile')->name('admin.update');
    Route::post('admin/change/password','Auth\AdminController@changePassword')->name('admin.change.password');

    //add new admin
    Route::get('admins/view','Auth\AdminController@viewAllAdmin')->name('admins.view');
    Route::get('admins/create','Auth\AdminController@addNewAdmin')->name('admin.create');
    Route::post('admin/store','Auth\AdminController@storeNewAdmin')->name('admin.store');
    Route::put('admin/edit/email/{id}','Auth\AdminController@editEmail')->name('admin.email.edit');

    //admin status
    Route::get('admin/block/{id}','Auth\AdminController@blockAdmin')->name('admin.block');
    Route::get('admin/unblock/{id}','Auth\AdminController@unblockAdmin')->name('admin.unblock');
    Route::get('admin/promote/{id}','Auth\AdminController@promoteAdmin')->name('admin.promote');
    Route::get('admin/demote/{id}','Auth\AdminController@demoteAdmin')->name('admin.demote');
    Route::get('admin/delete/{id}','Auth\AdminController@deleteAdmin')->name('admin.delete');
});



