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
});


