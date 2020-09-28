<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'settings'], function () {
    Route::group(['as' => 'settings.'], function () {
        Route::get('/specialty', 'Settings\SettingsController@specialty')->name('showSpecialty');
    });
});
