<?php

Route::get('/login', array(
    'as' => 'fe.login',
    'uses' => 'PageController@login',
));
Route::get('/', array(
    'as' => 'fe.home',
    'uses' => 'PageController@index'
));
Route::get('/tim-kiem', array(
    'as' => 'fe.search',
    'uses' => 'SearchController@index'
));
Route::get('/dang-xuat', array(
    'as' => 'fe.logout',
    'uses' => 'PageController@logout'
));

Route::get('/chi-tiet/{id}', array(
    'as' => 'fe.book_details',
    'uses' => 'PageController@bookDetails'
));
Route::group(array('before' => 'fe.auth'), function() {

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
    Route::match(array('GET','POST'), '/remove-from-cart/{book_id}', array(
        'as' => 'fe.remove_from_cart',
        'uses' => 'CartController@remove'
    ));
    Route::post('/clear-cart', array(
        'as' => 'fe.clear_cart',
        'uses' => 'CartController@clear'
    ));

    Route::post('cart-submit', array(
        'as' => 'fe.cart.submit',
        'uses' => 'CartController@submit'
    ));
    /**
     * PROFILE ROUTES
     */
    Route::get('/tai-khoan', array(
        'as' => 'fe.account',
        'uses' => 'ProfileController@account'
    ));
    Route::get('/tai-lieu-dang-muon', array(
        'as' => 'fe.borrowing',
        'uses' => 'ProfileController@borrowing'
    ));

    Route::get('tai-lieu-dang-ky', array(
        'as' => 'fe.orders',
        'uses' => 'ProfileController@orders'
    ));

    Route::get('/lich-su-muon-tra', array(
        'as' => 'fe.history',
        'uses' => 'ProfileController@history'
    ));

    Route::post('/update-account', array(
        'as' => 'fe.update_account',
        'uses' => 'ProfileController@update'
    ));
    Route::post('/update-password', array(
        'as' => 'fe.update_password',
        'uses' => 'ProfileController@updatePassword'
    ));


    Route::get('/fe/extra/{id}', array(
        'as' => 'fe.extra',
        'uses' => 'ProfileController@extra',
    ));

});

