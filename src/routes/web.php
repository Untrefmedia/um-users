<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin', 'auth:admin']], function () {
    Route::resource('user', 'Untrefmedia\UMUsers\App\Http\Controllers\Admin\UserController');
    Route::get('userDataList', 'Untrefmedia\UMUsers\App\Http\Controllers\Admin\UserController@dataList')->name('user.dataList');
});
