<?php
Route::prefix('dashboard')
->name('dashboard.')
->middleware(['auth', 'role:super_admin|admin'])
->group(function () {

    Route::get('/','WelcomeController@index')->name('welcome');

    //category routes
    Route::resource('categories', 'CategoryController')->except('show');

    //role routes
    Route::resource('roles', 'RoleController')->except('show');

    //users routes
    Route::resource('users', 'UserController')->except('show');

    //movies routes
    Route::resource('movies', 'MovieController');

    //setting routes
    Route::get('/settings/social_login','SettingController@social_login')->name('settings.social_login');
    Route::get('/settings/social_links','SettingController@social_links')->name('settings.social_links');
    Route::post('/settings','SettingController@store')->name('settings.store');
});


