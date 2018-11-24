<?php


//Route::get('demo', ['uses'=>'Untrefmedia\UMUsers\UMUsersController@getIndex']);
Route::group(['prefix' => 'admin'], function () {
    Route::get('users', 'Untrefmedia\UMUsers\UMUsersController@getIndex')
        ->name('datatables');
    Route::get('demo.data', 'Untrefmedia\UMUsers\UMUsersController@anyData')
        ->name('users.data');

});