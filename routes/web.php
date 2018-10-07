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


Route::get('/sendsms', 'HomeController@sendsms')->name('sendsms');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/billing', 'Site\BillingController');

Route::resource('/company-details', 'Site\CompanyController');

Route::resource('/customer', 'Site\CustomerController');


Route::get('/company-details/delete/{id}', 'Site\CompanyController@delete')->name('company-details.delete');

Route::get('/customer/delete/{id}', 'Site\CustomerController@delete')->name('customer.delete');


Auth::routes();

Route::prefix('admin')->group(function(){


Route::get('/login','Auth\AdminLoginController@showloginform')->name('admin.login');

Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');


Route::get('/', 'AdminHomeController@index')->name('admin.dashboard');




});

