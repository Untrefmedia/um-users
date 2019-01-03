<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin', 'auth:admin']], function () {
    Route::resource('user', 'Untrefmedia\UMUsers\App\Http\Controllers\Admin\UserController');
    Route::get('user.dataList', 'Untrefmedia\UMUsers\App\Http\Controllers\Admin\UserController@dataList')->name('user.dataList');
});
