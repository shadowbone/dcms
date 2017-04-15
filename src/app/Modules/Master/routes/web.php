<?php
/**
 * Master User Routing
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('/add/{id?}', 'UserController@getAdd');
    Route::post('/get-data', 'UserController@getData');
    Route::post('/proses-simpan/{id?}', 'UserController@postSimpan');
});

/**
 * Master Menu Routing
 */
Route::group(['prefix' => 'menu'], function () {
	Route::get('/test-menu','MenuController@index');
});

/**
 * Master Role Routing
 */
Route::group(['prefix' => 'role'], function () {
    Route::post('/get-data', 'RoleController@getData');
});
