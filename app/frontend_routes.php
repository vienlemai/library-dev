<?php

Route::get('/', array('as' => 'fe.home', 'uses' => 'PageController@index'));
Route::get('/tim-kiem', array('as' => 'fe.search', 'uses' => 'PageController@search'));
