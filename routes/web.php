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
//Category Routes
Route::resource('category', 'CategoryController',['except' => ['show','edit','create']] );
//Product Routes
Route::resource('product', 'ProductController',['except' => ['show','edit','create']] );
});



