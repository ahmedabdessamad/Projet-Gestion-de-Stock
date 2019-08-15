<?php

Route::group(['module' => 'RH', 'middleware' => ['web'], 'namespace' => 'App\Modules\RH\Controllers'], function() {

        Route::group(['prefix' => 'departments', 'middleware' => ['responsible']],function(){
            Route::get('/', 'RHController@showDepartments')->name('showDepartments');
            Route::get('/add', 'RHController@showAddDepartment')->name('showAddDepartment');
            Route::post('/add', 'RHController@handleAddDepartment')->name('handleAddDepartment');
            Route::post('/edit', 'RHController@handleEditDepartment')->name('handleEditDepartment');
            Route::delete('/', 'RHController@handleDeleteDepartment')->name('handleDeleteDepartment');
            Route::get('api/add','RHController@apiHandleAddDepartment')->name('apiHandleAddDepartment');
        });


        Route::group(['prefix' => 'leave/request', 'middleware' => ['responsible']],function(){
        Route::get('/view', 'RequestLeavesController@showLeaveRequest')->name('showLeaveRequest');
        Route::get('/apprauver', 'RequestLeavesController@apprauverLeaveRequest')->name('apprauverLeaveRequest');
        Route::get('/refuser', 'RequestLeavesController@refuseLeaveRequest')->name('refuseLeaveRequest');
        Route::get('/add/leave/groupe', 'RequestLeavesController@showaddGroupLeave')->name('showaddGroupLeave');
         Route::post('/add/leave/groupe', 'RequestLeavesController@handleaddGroupLeave')->name('handleaddGroupLeave');
        });
        
    Route::group(['prefix' => 'grade', 'middleware' => ['responsible']],function(){
        Route::get('/list', 'GradeController@listGrade')->name('listGrade');
        Route::post('/add', 'GradeController@handleAddgrade')->name('handleAddgrade');
        Route::post('/edit/', 'GradeController@handleEditGrade')->name('handleEditGrade');
          Route::delete('/delete/', 'GradeController@handleDeletGrade')->name('handleDeletGrade');
      Route::get('/grade/api/add', 'GradeController@apiHandleAddGrade')->name('apiHandleAddGrade');
     });


    Route::group(['prefix' => 'employee', 'middleware' => ['responsible']],function(){
        Route::get('/list', 'EmployeeController@listEmployee')->name('showEmployee');
        Route::get('/add', 'EmployeeController@showAddEmployee')->name('showAddEmployee');
        Route::post('/add', 'EmployeeController@handleAddEmployee')->name('handleAddEmployee');
        });
      Route::get('employee/edit/{id}', 'EmployeeController@showEditEmployee')->name('showEditEmployee');
       Route::post('employee/edit/', 'EmployeeController@handleEditEmployee')->name('handleEditEmployee');
       Route::delete('/delete', 'EmployeeController@handleDeleteEmployee')->name('handleDeleteEmployee');
        /** api */


     /*   Route::group(['prefix' => 'departments', 'middleware' => ['responsible']],function(){
          Route::get('api/add','RHController@apiHandleAddDepartment')->name('apiHandleAddDepartment');
           Route::get('/', 'DepartementController@showDepartments')->name('responsibleShowDepartments');
            Route::get('/add', 'DepartementController@showAddDepartment')->name('showAddDepartment');
            Route::post('/add', 'DepartementController@handleAddDepartment')->name('handleAddDepartment');
            Route::post('/edit', 'DepartementController@handleEditDepartment')->name('handleEditDepartment');
            Route::delete('/', 'DepartementController@handleDeleteDepartment')->name('handleDeleteDepartment');
        });*/

            Route::get('/', 'RHController@showHolidays')->name('showHolidays');
            Route::get('/add', 'RHController@showAddHoliday')->name('showAddHoliday');
            Route::post('/add', 'RHController@handleAddHoliday')->name('handleAddHoliday');
            Route::post('/edit', 'RHController@handleEditHoliday')->name('handleEditHoliday');
            Route::delete('/', 'RHController@handleDeleteHoliday')->name('handleDeleteHoliday');



        Route::get('/employee/departement/get', 'EmployeeController@getEmployeeDepartement')->name('getEmployeeDepartement');
        Route::get('/employee/grade/get', 'EmployeeController@getEmployeeGrade')->name('getEmployeeGrade');
        Route::get('status/change', 'EmployeeController@apiChangeEmloyeeStatus')->name('apiChangeEmloyeeStatus');
        

    Route::group(['prefix' => 'profile', 'middleware' => ['responsible','admin']],function(){
        Route::get('/edit', 'ResponsibleController@showResponsibleEditProfile')->name('showResponsibleEditProfile');
        Route::post('/edit', 'ResponsibleController@handleResponsibleEditProfile')->name('handleResponsibleEditProfile');
     });

});
