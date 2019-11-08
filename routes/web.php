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

Auth::routes();

Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('admin');
Route::post('/admin', 'Auth\LoginController@login');


Route::get('/')->name('homepage')->uses('HomePageController@showHomePage');
Route::get('/inputSearch')->name('inputSearch')->uses('HomePageController@inputSearch');
Route::get('/selectSearch/{id}')->name('selectSearch')->uses('HomePageController@selectSearch');


Route::get('/admin/panel')->name('admin_panel')->uses('AdminController@adminPanel')->middleware('is_admin');
Route::get('/deal/detail/{id}')->name('see_deal_detail')->uses('AdminController@seeDealDetail');
Route::get('/delete/deal/{id}')->name('delete_deal')->uses('AdminController@deleteDeal');
Route::get('/approve/deal/{id}')->name('approve_deal')->uses('AdminController@approveDeal');
Route::get('/update/deal/{id}')->name('update/deal')->uses('AdminController@updateDeal');
Route::post('/update_deal_submit')->name('update_deal_submit')->uses('AdminController@updateDealSubmit');


Route::get('/deal_details/{id}')->name('deal_details')->uses('CustomersController@dealDetails');
Route::get('/buy_deal/{id}')->name('buy_deal')->uses('CustomersController@buyDeal');
Route::post('/buy_deal_submit')->name('buy_deal_submit')->uses('CustomersController@buyDealSubmit');


Route::get('/create_deal')->name('create_deal')->uses('CompanyController@createDeal');
Route::post('/create_deal_submit')->name('create_deal_submit')->uses('CompanyController@createDealSubmit');