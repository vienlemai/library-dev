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
        $storageModel = new Storage();
        $storages = Storage::where('parent_id', '=', null)
            ->get();
        $bookCount = array();
        $bookCount['all_books'] = Book::count();
        $bookCount['books'] = Book::books()->count();
        $bookCount['magazines'] = Book::magazines()->count();
        for ($i = 0; $i < $storages->count(); $i++) {
            $nodeLeaves = array();
            $storageModel->getLeavesOfRoot($storages[$i]->id, $nodeLeaves);
            if (empty($nodeLeaves)) {
                array_push($nodeLeaves, $storages[$i]->id);
            }
            $bookCount['storage'][$i] = array(
                'storageName' => $storages[$i]->name,
                'count' => DB::table('books')
                    ->whereIn('storage', $nodeLeaves)
                    ->count()
            );
        }

        if (Request::isMethod('GET')) {
            return View::make('statistics.book');
        } else {


            $response = array();
            $response['success'] = true;
            $response['html'] = View::make('statistics._book_result')->with('result', $bookCount)->render();
            return Response::json($response);
        }
    }

    public function circulation() {
        $start = Input::has('start') ? Input::get('start') : '';
        $end = Input::has('end') ? Input::get('end') : '';
        $time = Input::has('time') ? Input::get('time') : 'day';
        $type = Input::has('type') ? Input::get('type') : 'borrow';
        switch ($time) {
            case 'day':
                $start = Carbon\Carbon::now()->startOfDay();
                $end = Carbon\Carbon::now()->endOfDay();
                $timeTitle = 'trong hôm nay (' . $start->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'week':
                $start = Carbon\Carbon::now()->startOfWeek();
                $end = Carbon\Carbon::now()->endOfWeek();
                $timeTitle = 'trong tuần này (' . $start->format('d \t\h\á\n\g m Y') . '  - ' . $end->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'month':
                $start = Carbon\Carbon::now()->startOfMonth();
                $end = Carbon\Carbon::now()->endOfMonth();
                $timeTitle = 'trong tháng này (' . $start->format('d \t\h\á\n\g m Y') . '  - ' . $end->format('d \t\h\á\n\g m Y') . ')';
                break;
            case 'custom':
                try {
                    $startInput = Input::get('start');
                    $endInput = Input::get('end');
                    $start = Carbon\Carbon::createFromFormat('d-m-Y', str_ireplace('/', '-', $startInput));
                    $end = Carbon\Carbon::createFromFormat('d-m-Y', str_ireplace('/', '-', $endInput));
                    $timeTitle = 'trong khoảng thời gian từ (' . $start->format('d \t\h\á\n\g m Y') . ' đến ' . $end->format('d \t\h\á\n\g m Y') . ')';
                } catch (Exception $e) {
                    Session::flash('error', 'Thời gian bắt đầu và kết thúc không hợp lệ');
                    return Redirect::back();
                }
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
        $count['borrow'] = Circulation::borrow()->count();
        $count['lost'] = Circulation::lost()->count();
        return View::make('statistics.circulation', array(
                'circulations' => $circulations,
                'timeTitle' => $timeTitle,
                'typeTitle' => $typeTitle,
                'type' => $type,
                'time' => $time,
                'start' => $start->format('d/m/Y'),
                'end' => $end->format('d/m/Y'),
                'count' => $count
        ));
    }

    public function printCirculation() {
        $time = Input::has('time') ? Input::get('time') : 'day';
        $type = Input::has('type') ? Input::get('type') : 'borrow';
        $start = Input::has('start') ? Input::get('start') : '';
        $end = Input::has('end') ? Input::get('end') : '';
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
            case 'custom':
                try {
                    $startInput = Input::get('start');
                    $endInput = Input::get('end');
                    $start = Carbon\Carbon::createFromFormat('d-m-Y', str_ireplace('/', '-', $startInput));
                    $end = Carbon\Carbon::createFromFormat('d-m-Y', str_ireplace('/', '-', $endInput));
                    $timeTitle = 'trong khoảng thời gian từ (' . $start->format('d \t\h\á\n\g m Y') . ' đến ' . $end->format('d \t\h\á\n\g m Y') . ')';
                } catch (Exception $e) {
                    Session::flash('error', 'Thời gian bắt đầu và kết thúc không hợp lệ');
                    return Redirect::back();
                }
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
        $count['borrow'] = Circulation::borrow()->count();
        $count['lost'] = Circulation::lost()->count();
        return View::make('statistics.print_circulation', array(
                'circulations' => $circulations,
                'timeTitle' => $timeTitle,
                'typeTitle' => $typeTitle,
                'type' => $type,
                'time' => $time,
                'start' => $start->format('d/m/Y'),
                'end' => $end->format('d/m/Y'),
                'count' => $count,
        ));
    }

}
