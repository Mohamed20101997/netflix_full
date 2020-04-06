<?php
Route::group(['prefix' => 'dashboard','name'=>'dashboard.'], function () {
    Route::get('/','WelcomeController@index')->name('welcome');

});