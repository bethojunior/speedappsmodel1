<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'blog'], function () {
    Route::group(['as' => 'blog'], function () {
        Route::get('/new', 'Blog\BlogController@create')->name('.create');
        Route::get('/list', 'Blog\BlogController@list')->name('.list');
        Route::post('/insert', 'Blog\BlogController@insert')->name('.insert');
    });
});
