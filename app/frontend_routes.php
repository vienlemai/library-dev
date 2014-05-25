<?php

Route::get('/login', array(
    'as' => 'fe.login',
    'uses' => 'PageController@login',
));
Route::group(array('before' => 'fe.auth'), function() {
    Route::get('/', array(
        'as' => 'fe.home',
        'uses' => 'PageController@index'
    ));
    Route::get('/tim-kiem', array(
        'as' => 'fe.search',
        'uses' => 'PageController@search'
    ));
    Route::get('/dang-xuat', array(
        'as' => 'fe.logout',
        'uses' => 'PageController@logout'
    ));
});

