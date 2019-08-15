<?php

Route::group(['module' => 'Commerce', 'middleware' => ['api'], 'namespace' => 'App\Modules\Commerce\Controllers'], function() {

    Route::resource('commerce', 'CommerceController');

});
