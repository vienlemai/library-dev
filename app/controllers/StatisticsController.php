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

    public function circulation() {
        $start = '';
        $end = '';
        $time = Input::has('time') ? Input::get('time') : 'day';
        $type = Input::has('type') ? Input::get('type') : 'borrow';
        switch ($time) {
            case 'day':
                $start = Carbon\Carbon::now()->startOfDay();
                $end = Carbon\Carbon::now()->endOfDay();
                $timeTitle = 'hôm nay (' . $start->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'week':
                $start = Carbon\Carbon::now()->startOfWeek();
                $end = Carbon\Carbon::now()->endOfWeek();
                $timeTitle = 'tuần này (' . $start->format('d \t\h\á\n\g m Y') . '  - ' . $end->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'month':
                $start = Carbon\Carbon::now()->startOfMonth();
                $end = Carbon\Carbon::now()->endOfMonth();
                $timeTitle = 'tháng này (' . $start->format('d \t\h\á\n\g m Y') . '  - ' . $end->format('d \t\h\á\n\g m Y') . ')';
                break;
        }
        if ($type == 'borrow') {
            $typeQuery = 'created_at';
            $typeTitle = 'mượn';
        } else {
            $typeQuery = 'returned_at';
            $typeTitle = 'trả';
        }
        $circulations = Circulation::with('bookItem.book', 'reader', 'creator')
            ->whereBetween($typeQuery, array($start, $end))
            ->get();
        return View::make('statistics.circulation', array(
                'circulations' => $circulations,
                'timeTitle' => $timeTitle,
                'typeTitle' => $typeTitle,
                'type' => $type,
                'time' => $time
        ));
    }

    public function printCirculation() {
        $start = '';
        $end = '';
        $time = Input::has('time') ? Input::get('time') : 'day';
        $type = Input::has('type') ? Input::get('type') : 'borrow';
        switch ($time) {
            case 'day':
                $start = Carbon\Carbon::now()->startOfDay();
                $end = Carbon\Carbon::now()->endOfDay();
                $timeTitle = 'hôm nay (' . $start->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'week':
                $start = Carbon\Carbon::now()->startOfWeek();
                $end = Carbon\Carbon::now()->endOfWeek();
                $timeTitle = 'tuần này (' . $start->format('d \t\h\á\n\g m Y') . '  - ' . $end->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'month':
                $start = Carbon\Carbon::now()->startOfMonth();
                $end = Carbon\Carbon::now()->endOfMonth();
                $timeTitle = 'tháng này (' . $start->format('d \t\h\á\n\g m Y') . '  - ' . $end->format('d \t\h\á\n\g m Y') . ')';
                break;
        }
        if ($type == 'borrow') {
            $typeQuery = 'created_at';
            $typeTitle = 'mượn';
        } else {
            $typeQuery = 'returned_at';
            $typeTitle = 'trả';
        }
        $circulations = Circulation::with('bookItem.book', 'reader', 'creator')
            ->whereBetween($typeQuery, array($start, $end))
            ->get();
        return View::make('statistics.print_circulation', array(
                'circulations' => $circulations,
                'timeTitle' => $timeTitle,
                'typeTitle' => $typeTitle,
                'type' => $type,
                'time' => $time
        ));
    }

}
