<?php

class StatisticsController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    public $layout = 'layouts.admin';

    public function reader() {
        return View::make('statistics.reader');
    }

    public function book() {
        return View::make('statistics.book');
    }

}