<?php
/**
 * Master User Routing
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('/add/{id?}', 'UserController@getAdd');
    Route::post('/get-data', 'UserController@getData');
    Route::post('/proses-simpan/{id?}', 'UserController@postSimpan');
});
