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
//var_dump(User::$get_actions);
//exit();
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

Route::get('error/{type}', array(
    'as' => 'error',
    'uses' => 'AdminController@error'
));
//home
Route::get('/', array('as' => 'home', 'before' => 'auth', 'uses' => 'BookController@catalog'));
//logout
Route::get('logout', array('as' => 'logout', 'uses' => 'AdminController@getLogout'));
/**
 * routers for get request that need to authenticate to continute
 */
Route::group(array('before' => 'auth'), function () {
    foreach (User::$get_actions as $action) {
        Route::get($action['path'], array(
            'as' => $action['name'],
            'uses' => $action['controller'] . '@' . $action['action']
        ));
    }
    Route::get('book/catalog/search', array(
        'as' => 'book.catalog.search',
        'uses' => 'BookController@catalogSearch'
    ));
    Route::get('book/moderate/search', array(
        'as' => 'book.moderate.search',
        'uses' => 'BookController@moderateSearch'
    ));

    Route::get('book/moderate/{id}', array(
        'as' => 'book.moderate.view',
        'uses' => 'BookController@moderateView'
    ));
    Route::get('book/publish/{id}', array(
        'as' => 'book.publish',
        'uses' => 'BookController@publish'
    ));
    Route::get('book/catalog/{id}', array(
        'as' => 'book.catalog.view',
        'uses' => 'BookController@catalogView'
    ));
    Route::get('book/library', array(
        'as' => 'book.library',
        'uses' => 'BookController@library'
    ));
    Route::get('book/library/view/{id}', array(
        'as' => 'book.library.view',
        'uses' => 'BookController@libraryView'
    ));
    Route::get('book/barcode/{id}', array(
        'as' => 'book.barcode',
        'uses' => 'BookController@barcode'
    ));

    Route::get('book/library/search', array(
        'as' => 'book.library.search',
        'uses' => 'BookController@librarySearch'
    ));
    Route::get('book/circulate', array(
        'as' => 'book.circulate',
        'uses' => 'BookController@circulate'
    ));
    Route::get('user/create', array(
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ));


    Route::get('readers', array(
        'as' => 'readers',
        'uses' => 'ReaderController@index',
    ));

    Route::get('reader/search', array(
        'as' => 'reader.search',
        'uses' => 'ReaderController@search',
    ));

    Route::get('reader/{id}', array(
        'as' => 'reader.view',
        'uses' => 'ReaderController@view'
    ));

    Route::get('reader/card/{id}', array(
        'as' => 'reader.card',
        'uses' => 'ReaderController@card'
    ));

//configs
    Route::get('configs', array(
        'as' => 'configs',
        'uses' => 'ConfigController@edit',
    ));
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
    Route::post('book/{id}/update', array(
        'as' => 'book.update',
        'uses' => 'BookController@update',
    ));
    Route::post('book/submit', array(
        'as' => 'book.submit',
        'uses' => 'BookController@submit',
    ));
    Route::delete('book/{id}/delete', array(
        'as' => 'book.delete',
        'uses' => 'BookController@destroy',
    ));

    Route::post('book/disapprove/{id}', array(
        'as' => 'book.disapprove',
        'uses' => 'BookController@disapprove'
    ));

    Route::post('user/save', array(
        'as' => 'user.save',
        'uses' => 'UserController@save',
    ));
    Route::post('reader/save', array(
        'as' => 'reader.save',
        'uses' => 'ReaderController@save',
    ));
//configs
    Route::post('config/update', array(
        'as' => 'config.update',
        'uses' => 'ConfigController@update'
    ));
    Route::post('upload/image', array(
        'as' => 'upload.image',
        'uses' => 'FileController@uploadImage'
    ));
});

