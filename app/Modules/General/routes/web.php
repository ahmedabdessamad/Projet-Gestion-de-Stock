<?php

Route::group(['module' => 'General', 'middleware' => ['web'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');

});
