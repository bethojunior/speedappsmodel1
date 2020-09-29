<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();


Route::get('login', function () {
    return view('auth.login');
});

Route::get('/','HomeController@index');

Route::get('/blog','Blog\BlogController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'Settings\SettingsController@index')->name('home');
});

Route::middleware('auth')
    ->group(base_path('routes/private/user.php'));

Route::middleware('auth')
    ->group(base_path('routes/private/settings.php'));

Route::middleware('auth')
    ->group(base_path('routes/private/carousel.php'));

Route::middleware('auth')
    ->group(base_path('routes/private/blog.php'));

Route::middleware('auth')
    ->group(base_path('routes/private/specialty.php'));
