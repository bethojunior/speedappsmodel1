<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'specialty'], function () {
    Route::group(['as' => 'specialty'], function () {
        Route::post('/create', 'Specialties\SpecialtiesController@store')->name('.store');
    });
});
