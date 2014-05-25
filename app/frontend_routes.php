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

        Route::get('/chi-tiet/{id}', array(
            'as' => 'fe.book_details',
            'uses' => 'PageController@bookDetails'
        ));
        /*
         * CART ROUTES
         */
        Route::get('/gio-sach', array(
            'as' => 'fe.cart',
            'uses' => 'CartController@show'
        ));
        Route::post('/add-to-cart', array(
            'as' => 'fe.add_to_cart',
            'uses' => 'CartController@add'
        ));
        Route::post('/remove-from-cart', array(
            'as' => 'fe.remove_from_cart',
            'uses' => 'CartController@remove'
        ));
        Route::post('/clear-cart', array(
            'as' => 'fe.clear_cart',
            'uses' => 'CartController@clear'
        ));
    });

