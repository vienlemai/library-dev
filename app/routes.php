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
Route::get('test', function() {
    
});
/**
 * Common routes
 */
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
Route::get('/', array('as' => 'home', 'before' => 'auth', 'uses' => 'AdminController@index'));
//logout
Route::get('logout', array('as' => 'logout', 'uses' => 'AdminController@getLogout'));

/**
 * Ajax routes, dont need to authenticate
 */
Route::get('book/catalog/search', array(
    'as' => 'book.catalog.search',
    'uses' => 'BookController@catalogSearch'
));
Route::get('book/moderate/search', array(
    'as' => 'book.moderate.search',
    'uses' => 'BookController@moderateSearch'
));
Route::get('book/library/search', array(
    'as' => 'book.library.search',
    'uses' => 'BookController@librarySearch'
));
Route::get('reader/search', array(
    'as' => 'reader.search',
    'uses' => 'ReaderController@search',
));
Route::post('circulation/reader', array(
    'as' => 'circulation.reader',
    'uses' => 'CirculationController@loadReader',
));
Route::post('circulation/book', array(
    'as' => 'circulation.book',
    'uses' => 'CirculationController@loadBook',
));
Route::post('circulation/borrow', array(
    'as' => 'circulation.borrow',
    'uses' => 'CirculationController@borrow',
));
Route::post('circulation/return', array(
    'as' => 'circulation.return',
    'uses' => 'CirculationController@returnBook',
));
Route::post('circulation/extra', array(
    'as' => 'circulation.extra',
    'uses' => 'CirculationController@extra',
));
Route::get('inventory/search', array(
    'as' => 'inventory.search',
    'uses' => 'InventoryController@search'
));


/**
 * routers for get request that need to authenticate to continute
 */
Route::group(array('before' => 'auth'), function () {
    Route::get('book/create', array(
        'as' => 'book.create',
        'uses' => 'BookController@create'
    ));
    Route::get('book/catalog', array(
        'as' => 'book.catalog',
        'uses' => 'BookController@catalog'
    ));
    Route::get('book/moderate', array(
        'as' => 'book.moderate',
        'uses' => 'BookController@moderate'
    ));
    Route::get('book/{id}/edit', array(
        'as' => 'book.edit',
        'uses' => 'BookController@edit'
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
    //readers
    Route::get('reader/create', array(
        'as' => 'reader.create',
        'uses' => 'ReaderController@create'
    ));
    Route::get('readers', array(
        'as' => 'readers',
        'uses' => 'ReaderController@index',
    ));
    Route::get('reader/view/{id}', array(
        'as' => 'reader.view',
        'uses' => 'ReaderController@view'
    ));

    Route::get('reader/card/{id}', array(
        'as' => 'reader.card',
        'uses' => 'ReaderController@card'
    ));
    Route::get('reader/pause/{id}', array(
        'as' => 'reader.pause',
        'uses' => 'ReaderController@pause'
    ));
    Route::get('reader/unpause/{id}', array(
        'as' => 'reader.unpause',
        'uses' => 'ReaderController@unpause',
    ));
    //configs
    Route::get('configs', array(
        'as' => 'configs',
        'uses' => 'ConfigController@edit',
    ));

    //circulations
    Route::get('circulation', array(
        'as' => 'circulation',
        'uses' => 'CirculationController@index',
    ));
    //inventory
    Route::get('inventory/index', array(
        'as' => 'inventory.index',
        'uses' => 'InventoryController@index'
    ));
    Route::get('inventory/create', array(
        'as' => 'inventory.create',
        'uses' => 'InventoryController@create'
    ));
    Route::get('inventory/execute/{id}', array(
        'as' => 'inventory.execute',
        'uses' => 'InventoryController@execute'
    ));

    Route::get('inventory/result/{id}', array(
        'as' => 'inventory.result',
        'uses' => 'InventoryController@result'
    ));
    //user    
    Route::get('user/create', array(
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ));
    Route::get('statistics/reader', array(
        'as' => 'statistics.reader',
        'uses' => 'StatisticsController@reader',
    ));
    Route::get('statistics/book', array(
        'as' => 'statistics.book',
        'uses' => 'StatisticsController@book',
    ));

    Route::get('user/permission/{id}', array(
        'as' => 'user.permission',
        'uses' => 'UserController@getPermission',
    ));
    Route::match(array('GET', 'POST'), 'statistics/reader', array(
        'as' => 'statistics.reader',
        'uses' => 'StatisticsController@reader',
    ));
    Route::match(array('GET', 'POST'), 'statistics/book', array(
        'as' => 'statistics.book',
        'uses' => 'StatisticsController@book',
    ));

    Route::get('users', array(
        'as' => 'users',
        'uses' => 'UserController@index'
    ));

    Route::get('user/view/{id}', array(
        'as' => 'user.view',
        'uses' => 'UserController@view'
    ));

    Route::get('user/edit/{id}', array(
        'as' => 'user.edit',
        'uses' => 'UserController@edit',
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

    Route::delete('user/{id}/delete', array(
        'as' => 'user.delete',
        'uses' => 'UserController@delete'
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

    Route::post('inventory/save', array(
        'as' => 'inventory.save',
        'uses' => 'InventoryController@save'
    ));

    Route::post('inventory.finish', array(
        'as' => 'inventory.finish',
        'uses' => 'InventoryController@finish'
    ));
    Route::post('inventory/book/{id}', array(
        'as' => 'inventory.book',
        'uses' => 'InventoryController@getBookItem'
    ));
    Route::post('user/permission/{id}', array(
        'as' => 'user.permission',
        'uses' => 'UserController@postPermission',
    ));

    Route::post('user/update/{id}', array(
        'as' => 'user.update',
        'uses' => 'UserController@update',
    ));
});
Event::listen("illuminate.query", function($query, $bindings, $time, $name) {
    Log::info($query);
});
