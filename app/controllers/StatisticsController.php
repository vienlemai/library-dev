<?php

class StatisticsController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    public $layout = 'layouts.admin';

    public function reader() {
        if (Request::isMethod('GET')) {
            return View::make('statistics.reader');
        } else {
            $response = [];
            $response['success'] = true;
            $response['html'] = View::make('statistics._reader_result')->render();
            return Response::json($response);
        }
    }

    public function book() {
        return View::make('statistics.book');
    }

}