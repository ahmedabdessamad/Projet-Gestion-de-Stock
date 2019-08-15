<?php

Route::group(['module' => 'Commerce', 'middleware' => ['web'], 'namespace' => 'App\Modules\Commerce\Controllers'], function() {

     Route::group(['prefix' => 'categorie', 'middleware' => ['responsible']],function(){
       Route::get('/list', 'CategorieController@showCategorie')->name('showCategorie');
       Route::post('/add', 'CategorieController@handleAddCategorie')->name('handleAddCategorie');
       Route::post('/edit', 'CategorieController@handleEditCategorie')->name('handleEditCategorie');
       Route::delete('/delete', 'CategorieController@handleDeleteCategorie')->name('handleDeleteCategorie');
     });

Route::group(['prefix' => 'equipements', 'middleware' => ['responsible']],function(){
  Route::get('/list', 'EquipementsController@showEquipements')->name('showEquipements');
  Route::get('/add', 'EquipementsController@showAddequipements')->name('showAddequipements');
  Route::post('/add', 'EquipementsController@handleAddequipements')->name('handleAddequipements');
  Route::post('/edit', 'EquipementsController@handleEditequipements')->name('handleEditequipements');
  Route::get('/API/GetCategories', 'EquipementsController@getCategorie_id')->name('getCategorie_id');
 Route::get('/API/Cahnge/status', 'MissionController@ApiChangeProductStatus')->name('ApiChangeProductStatus');

});

     Route::group(['prefix' => 'client', 'middleware' => ['responsible']],function(){
       Route::get('/list', 'CustomerController@showCustomer')->name('showCustomer');
       Route::get('/add', 'CustomerController@showAddCustomer')->name('showAddCustomer');
       Route::post('/add', 'CustomerController@handleAddCustomer')->name('handleAddCustomer');
       Route::get('/edit/{id}', 'CustomerController@showEditCustomer')->name('showEditCustomer');
       Route::post('/edit/', 'CustomerController@handleEditCustomer')->name('handleEditCustomer');       
       Route::delete('/delete/', 'CustomerController@handleDeleteCustomer')->name('handleDeleteCustomer');
     });

     Route::group(['prefix' => 'provider', 'middleware' => ['responsible']],function(){
      Route::get('/list', 'ProviderController@showProviders')->name('showProviders');  
      Route::get('/add', 'ProviderController@showAddProvider')->name('showAddProvider'); 
      Route::post('/add', 'ProviderController@handleAddProvider')->name('handleAddProvider'); 
      Route::get('/edit/{id}', 'ProviderController@showEditProvider')->name('showEditProvider');      
      Route::post('/edit', 'ProviderController@handleEditProvider')->name('handleEditProvider');      
      Route::delete('/delete', 'ProviderController@handleDeleteProvider')->name('handleDeleteProvider');      
     });

     Route::group(['prefix' => 'mission', 'middleware' => ['responsible']],function(){
      Route::get('/list', 'MissionController@showMission')->name('showMission');Route::get('/follow/{id}', 'MissionController@followMission')->name('followMission'); 
      Route::get('/add', 'MissionController@showAddMission')->name('showAddMission');
      Route::post('/add', 'MissionController@handleAddMission')->name('handleAddMission');    
      Route::get('/api/get/sites', 'MissionController@missionGetSites')->name('missionGetSites');


      Route::delete('/api/remove/speaker', 'MissionController@removeSpeaker')->name('removeSpeaker');
      }); 

});




