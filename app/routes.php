<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


//users routers
//Route::get('/user/create', 'UserController@create');
Route::post('login', array(
    'as' => 'login',
    'uses' => 'AdminController@postLogin'
));
Route::get('login', array(
    'as' => 'login',
    'uses' => 'AdminController@login',
));

/**
 * routers for get request that need to authenticate to continute
 */
Route::group(array('before' => 'auth'), function () {
    //home
    Route::get('/', array('as' => 'home', 'uses' => 'AdminController@index'));
    //logout
    Route::get('logout', array('as' => 'logout', 'uses' => 'AdminController@getLogout'));
    //book catalog index
    Route::get('book/catalog', array('as' => 'book.catalog', 'uses' => 'BookController@catalog'));
    //book create
    Route::get('book/create', array(
        'as' => 'book.create',
        'uses' => 'BookController@create',
    ));
    //print barcode
    Route::get('book/{id}/preview', array('as' => 'book.preview', 'uses' => 'BookController@preview'));
});

/**
 * routers for post request that need to authenticate and csrf validate
 */
Route::group(array('before' => 'auth|csrf'), function () {
    //book save
    Route::post('book/save', array(
        'as' => 'book.save',
        'uses' => 'BookController@save',
    ));
});


Route::post('/book/generate-barcode', array(
    'as' => 'book.generate-barcode',
    'uses' => 'BookController@generateBarcode',
    'before' => 'auth'
));

Route::get('/user/create', array(
	'as' => 'user.create',
	'uses' => 'UserController@create',
));
//Route::get('/book/create','BookController@create');
