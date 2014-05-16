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
            $result = array();
            if (Input::get('all_readers') == 1) {
                $result['all_readers'] = Reader::count();
            }
            if (Input::get('borrowing_readers') == 1) {
                $result['borrowing_readers'] = Circulation::distinct()->get(array('reader_id'))->count();
            }
            if (Input::get('borrowing_times') == 1) {
                $result['borrowing_times'] = Circulation::count();
            }
            return Response::json(array(
                    'success' => true,
                    'html' => View::make('statistics._reader_result')->with('result', $result)->render()
            ));
        }
    }

    public function book() {
        if (Request::isMethod('GET')) {
            return View::make('statistics.book');
        } else {
            $result = array();
            $result['all_books'] = Book::count();
            $result['books'] = Book::books()->count();
            $result['magazines'] = Book::magazines()->count();
            
            $response = array();
            $response['success'] = true;
            $response['html'] = View::make('statistics._book_result')->with('result', $result)->render();
            return Response::json($response);
        }
    }

}