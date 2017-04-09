<?php
/**
 * Master User Routing
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('/add', 'UserController@getAdd');
    Route::post('/get-data', 'UserController@getData');
});
