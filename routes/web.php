<?php

use App\Http\Controllers\Admin\BalanceController;



Route::group(['middlewaer' => ['auth'], 'namespace'=>'Admin', 'prefix'=>'admin'], function () {

    Route::get('historic', 'BalanceController@historic')->name('balance.historic');

    Route::post('transfer' , 'BalanceController@transferStore')->name('transfer.store');
    Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');
    Route::post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');

    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
    Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');

    Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');
    Route::post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');

    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    Route::get('/', 'AdminController@index')->name('admin.home');
});



Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


