<?php

Route::group(['module' => 'General', 'middleware' => ['api'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');

});
