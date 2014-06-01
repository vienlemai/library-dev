<?php

class StatisticsController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    public $layout = 'layouts.admin';

    public function reader() {
        $time = $this->_timeFromInput();
        if ($time['status'] == false) {
            Session::flash('error', $time['message']);
            return Redirect::back();
        }
        $readerCount['all'] = Reader::count();
        $readerCount['expired'] = Reader::where('status', Reader::SS_EXPIRED)->count();
        $readerCount['paused'] = Reader::where('status', Reader::SS_PAUSED)->count();
        $reades = Reader::with('creator')
            ->whereBetween('created_at', array($time['start'], $time['end']))
            ->orderBy('created_at', 'DESC')
            ->get();
        if (Input::has('print')) {
            return View::make('statistics.print_reader', array(
                    'readerCount' => $readerCount,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'readers' => $reades,
                    'timeTitle' => $time['timeTitle'],
            ));
        } else {
            return View::make('statistics.reader', array(
                    'readerCount' => $readerCount,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'readers' => $reades,
                    'timeTitle' => $time['timeTitle'],
            ));
        }
    }

    public function user() {
        $time = $this->_timeFromInput();
        $userId = Input::has('user_id') ? Input::get('user_id') : -1;
        if ($time['status'] == false) {
            Session::flash('error', $time['message']);
            return Redirect::back();
        }
        $users = User::all();
        $userCount = array();
        foreach (User::$TYPE_LABELS as $k => $v) {
            $userByType = $users->filter(function($item)use ($k) {
                if ($item->group_id == $k) {
                    return $item;
                }
            });
            $userCount[$k] = array(
                'title' => $v,
                'value' => $userByType->count(),
            );
        }
        $activities = Activity::whereBetween('created_at', array($time['start'], $time['end']));
        if ($userId != -1) {
            $activities->where('author_id', $userId);
            $user = User::find(array('full_name'));
            $userTitle = 'nhân viên ' . $user->full_name;
        } else {
            $userTitle = 'tất cả nhân viên';
        }
        if (Input::has('print')) {
            return View::make('', array(
                    'users' => $users,
                    'userCount' => $userCount,
                    'activities' => $activities,
                    'userTitle' => $userTitle
            ));
        } else {
            return View::make('statistics.user', array(
                    'users' => $users,
                    'userCount' => $userCount,
                    'activities' => $activities,
                    'userTitle' => $userTitle,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'timeTitle' => $time['timeTitle'],
            ));
        }
    }

    public function book() {
        $time = $this->_timeFromInput();
        if ($time['status'] == false) {
            Session::flash('error', $time['message']);
            return Redirect::back();
        }
        $storageModel = new Storage();
        $storages = Storage::where('parent_id', '=', null)
            ->get();
        $bookCount = array();
        $bookCount['publish_books'] = BookItem::whereHas('book', function($query) {
                $query->where('book_type', Book::TYPE_BOOK)
                    ->where('status', Book::SS_PUBLISHED);
            })->count();
        $bookCount['publish_magazines'] = BookItem::whereHas('book', function($query) {
                $query->where('book_type', Book::TYPE_MAGAZINE)
                    ->where('status', Book::SS_PUBLISHED);
            })->count();
        for ($i = 0; $i < $storages->count(); $i++) {
            $nodeLeaves = array();
            $storageModel->getLeavesOfRoot($storages[$i]->id, $nodeLeaves);
            if (empty($nodeLeaves)) {
                array_push($nodeLeaves, $storages[$i]->id);
            }
            $bookCount['storage'][$i] = array(
                'storageName' => $storages[$i]->name,
                'count' => BookItem::whereHas('book', function($query)use($nodeLeaves) {
                    $query->whereIn('storage', $nodeLeaves);
                })->count(),
            );
        }
        $bookCount['lost_books'] = Circulation::where('is_lost', true)
            ->count();
        $books = Book::with('moderator')->where('status', Book::SS_PUBLISHED)
            ->whereBetween('published_at', array($time['start'], $time['end']))
            ->orderBy('published_at')
            ->get();
        if (Input::has('print')) {
            return View::make('statistics.print_book', array(
                    'bookCount' => $bookCount,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'books' => $books,
                    'timeTitle' => $time['timeTitle'],
            ));
        } else {
            return View::make('statistics.book', array(
                    'bookCount' => $bookCount,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'books' => $books,
                    'timeTitle' => $time['timeTitle'],
            ));
        }
    }

    public function circulation() {
        $type = Input::has('type') ? Input::get('type') : 'borrow';
        $time = $this->_timeFromInput();
        if ($time['status'] == false) {
            Session::flash('error', $time['message']);
            return Redirect::back();
        }
        if ($type == 'borrow') {
            $typeQuery = 'created_at';
            $typeTitle = 'mượn';
        } else {
            $typeQuery = 'returned_at';
            $typeTitle = 'trả';
        }
        $circulations = Circulation::with('bookItem.book', 'reader', 'creator')
            ->whereBetween($typeQuery, array($time['start'], $time['end']))
            ->get();
        $bookCount['lost_books'] = Circulation::where('is_lost', true)
            ->count();
        $bookCount['lended_book'] = Circulation::where('returned', false)
            ->count();
        $bookCount['expired_book'] = Circulation::where('expired', true)
            ->count();

        if (Input::has('print')) {
            return View::make('statistics.print_circulation', array(
                    'circulations' => $circulations,
                    'timeTitle' => $time['timeTitle'],
                    'typeTitle' => $typeTitle,
                    'type' => $type,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'bookCount' => $bookCount
            ));
        } else {
            return View::make('statistics.circulation', array(
                    'circulations' => $circulations,
                    'timeTitle' => $time['timeTitle'],
                    'typeTitle' => $typeTitle,
                    'type' => $type,
                    'time' => $time['timeType'],
                    'start' => $time['start']->format('d/m/Y'),
                    'end' => $time['end']->format('d/m/Y'),
                    'bookCount' => $bookCount
            ));
        }
    }

    protected function _timeFromInput() {
        $time = Input::has('time') ? Input::get('time') : 'day';
        $start = Input::has('start') ? Input::get('start') : '';
        $end = Input::has('end') ? Input::get('end') : '';
        $result = array(
            'status' => true,
            'timeType' => $time,
        );
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
                    $result['status'] = false;
                    $result['message'] = 'Thời gian bắt đầu và kết thúc không hợp lệ';
                    return $result;
                }
        }
        $result['start'] = $start;
        $result['end'] = $end;
        $result['timeTitle'] = $timeTitle;
        return $result;
    }

}
