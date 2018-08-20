<?php

use App\Http\Controllers\Admin\BalanceController;



Route::group(['middlewaer' => ['auth'], 'namespace'=>'Admin', 'prefix'=>'admin'], function () {

    Route::get('withdaw', 'BalanceController@withdaw')->name('balance.withdaw');
    Route::post('withdaw', 'BalanceController@withdawStore')->name('withdaw.store');
    Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');
    Route::post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');
    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    Route::get('/', 'AdminController@index')->name('admin.home');
});



Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


