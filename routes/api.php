<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'carousel'], function () {
    Route::group(['as' => 'carousel'], function () {
        Route::delete('/{id}','Carousel\CarouselController@delete');
    });
});

Route::group(['prefix' => 'blog'], function () {
    Route::group(['as' => 'blog'], function () {
        Route::delete('/{id}','Blog\BlogController@delete');
    });
});
Route::group(['prefix' => 'specialty'], function () {
    Route::group(['as' => 'specialty'], function () {
        Route::delete('/{id}','Specialties\SpecialtiesController@destroy');
    });
});
