<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin', 'auth:admin']], function () {
    Route::resource('users', 'Untrefmedia\UMUsers\App\Http\Controllers\UMUsersController');
    Route::get('users.dataList', 'Untrefmedia\UMUsers\App\Http\Controllers\UMUsersController@dataList')->name('users.dataList');
});
