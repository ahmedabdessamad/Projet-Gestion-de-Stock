<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/logout', 'UserController@handleLogout')->name('handleLogout');
    Route::get('/login', 'UserController@showUserLogin')->name('showUserLogin');
    Route::get('/admin', 'UserController@showAdminLogin')->name('showAdminLogin');
    Route::post('/login', 'UserController@handleUserLogin')->name('handleUserLogin');
    Route::get('/roles', 'UserController@apiGetRoles')->name('apiGetRoles');
    Route::get('/status', 'UserController@apiChangeUserStatus')->name('apiChangeUserStatus');


    Route::group(['prefix' => 'responsible', 'middleware' => ['responsible']],function(){
        Route::get('/', 'UserController@showResponsibleDashboard')->name('showResponsibleDashboard');

    });

    Route::group(['prefix' => 'admin', 'middleware' => ['admin']],function(){
        Route::get('/dashboard', 'UserController@showAdminDashboard')->name('showAdminDashboard');

        Route::group(['prefix' => 'users', 'middleware' => ['admin']],function(){
            Route::get('/', 'UserController@showUsers')->name('showUsers');
            Route::get('/add', 'UserController@showAddUser')->name('showAddUser');
            Route::post('/add', 'UserController@handleAddUser')->name('handleAddUser');
            Route::get('/edit/{id}', 'UserController@showEditUser')->name('showEditUser');
            Route::delete('/', 'UserController@handleDeleteUser')->name('handleDeleteUser');
        });
    });

     Route::group(['prefix' => 'employee', 'middleware' => ['employee']],function(){
        Route::get('/dashboard', 'UserController@showEmployeeDashboard')->name('showEmployeeDashboard');

    });
});
