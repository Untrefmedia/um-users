<?php


Route::group(['prefix' => 'admin','middleware'=>['web', 'admin', 'auth:admin']], function () {
    Route::get('users', 'Untrefmedia\UMUsers\UMUsersController@getIndex')
        ->name('datatables');
    Route::get('users.data', 'Untrefmedia\UMUsers\UMUsersController@anyData')
        ->name('users.data');

    Route::get('users/{id}/edit','Untrefmedia\UMUsers\UMUsersController@edit');

});


