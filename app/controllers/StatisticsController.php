<?php

class StatisticsController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    public $layout = 'layouts.admin';

    public function reader() {
        if (Request::isMethod('GET')) {
            $result = [];
            $result['readers_count'] = Reader::count();
            $result['borrowing_readers_count'] = Circulation::distinct()->get(array('reader_id'))->count();
            $result['borrow_times_count'] = Circulation::count();
            return View::make('statistics.reader')->with('result', $result);
        } else {
            return Response::json(array(
                    'success' => true,
                    'html' => View::make('statistics._reader_result')->render()
            ));
        }
    }

    public function book() {
        if (Request::isMethod('GET')) {
            return View::make('statistics.book');
        } else {
            $response = [];
            $response['success'] = true;
            $response['html'] = View::make('statistics._book_result')->render();
            return Response::json($response);
        }
    }

}