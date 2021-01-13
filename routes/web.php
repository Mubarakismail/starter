<?php

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function (){

    return "Home";
});


Route::get('/fillable','CrudController@getOffers');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

    Route::group(['prefix'=>'offers'],function (){
        Route::get('create','CrudController@create');
        Route::post('store','CrudController@store')->name('offers.store');
    });

    Route::get('all','CrudController@getAllOffers');
});
