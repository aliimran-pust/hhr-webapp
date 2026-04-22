<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    // Plot routes
    Route::get('/plots', 'PlotController@index');
    Route::get('/plots/{plot}', 'PlotController@show');
    Route::post('/plots/{plot}/assign-primary', 'PlotController@assignPrimary');
    Route::post('/plots/{plot}/add-secondary', 'PlotController@addSecondary');

    // Member routes
    Route::get('/members', 'MemberController@index');
    Route::post('/members', 'MemberController@store');
    Route::get('/members/{member}', 'MemberController@show');
    Route::post('/members/{member}/payments', 'MemberController@recordPayment');

    // Rental routes
    Route::post('/rentals', 'RentalController@store');
    Route::post('/rentals/{rental}/payments', 'RentalController@recordPayment');
    Route::post('/rentals/{rental}/terminate', 'RentalController@terminate');

    // Alert routes
    Route::get('/members/{member}/alerts', 'AlertController@index');
    Route::post('/alerts/{alert}/resolve', 'AlertController@resolve');
});
