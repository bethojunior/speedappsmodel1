<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'carousel'], function () {
    Route::group(['as' => 'carousel.'], function () {
        Route::get('/', 'Carousel\CarouselController@index')->name('list');
        Route::post('/insert', 'Carousel\CarouselController@insert')->name('insert');
    });
});
