<?php


Route::group(['prefix' => 'admin','middleware'=>['web', 'admin', 'auth:admin']], function () {
    Route::get('users', 'Untrefmedia\UMUsers\App\Http\Controllers\UMUsersController@getIndex')
        ->name('datatables');
    Route::get('users.data', 'Untrefmedia\UMUsers\App\Http\Controllers\UMUsersController@anyData')
        ->name('users.data');

    Route::get('users/{id}/edit','Untrefmedia\UMUsers\App\Http\Controllers\UMUsersController@edit');

});


