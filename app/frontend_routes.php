<?php

Route::group(array('namespace' => 'Frontend'), function() {
        Route::get('/', array('as' => 'root', 'uses' => 'PageController@index'));
    });
