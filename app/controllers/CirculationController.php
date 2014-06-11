<?php

class CirculationController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    const SS_READER_PAUSED = 2;
    const SS_READER_EXPIRED = 3;
    const SS_READER_NOTFOUND = 1;
    const SS_READER_OK = 1;

    public function index() {
        if ($this->_checkInventory() === true) {
            return View::make('circulation.index');
        } else {
            return Redirect::route('error', array('inventory'));
        }
    }

    public function loadReader() {
        $barcode = Input::get('barcode');
        $reader = Reader::where('barcode', '=', $barcode)->with('circulations', 'circulations.bookItem', 'circulations.bookItem.book')->first();
        if (!empty($reader)) {
            $result['status'] = true;
            $now = Carbon\Carbon::now();
            $bookFine = DB::table('configs')
                ->where('key', 'book_expired_fine')
                ->first();
            $fine = 0;
            $booksExpired = 0;
            foreach ($reader->circulations as $row) {
                $diff = $now->diffInDays($row->expired_at);
                if ($row->expired_at->lt($now) && $diff > 0) {
                    $fine += ($diff * $bookFine->value);
                    $booksExpired++;
                }
            }
            $cirCount = $this->_countCirculationScope($reader->circulations);
            $viewData = array(
                'reader' => $reader,
                'msgFine' => $fine ? $msgFine = 'Trễ hạn ' . $booksExpired . ' tài liệu, tiền phạt : ' . $fine . '(đồng)' : '',
                'counLocal' => $cirCount['local'],
                'countRemote' => $cirCount['remote'],
            );
            $result['reader_html'] = View::make('circulation.partials.reader', $viewData)->render();
            $viewData = array(
                'circulations' => $reader->circulations
            );
            $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
            $result['reader_id'] = $reader->id;
        } else {
            $result['status'] = false;
            $result['message'] = 'Không tìm thấy bạn đọc với mã thẻ "' . $barcode . '"';
        }
        return Response::json($result);
    }

    public function loadBook() {
        $barcode = Input::get('barcode');
        $readerId = Input::get('readerId');
        $bookItem = BookItem::where('barcode', '=', $barcode)->with('book')->first();
        $reader = Reader::with('circulations', 'circulations.bookItem', 'circulations.bookItem.book')
                ->get()->find($readerId);
        $max_book_remote = $this->configs['max_book_remote'];
        $max_book_local = $this->configs['max_book_local'];
        $max_extra_times = $this->configs['extra_times'];
        $msgMaxBookRemote = 'Chỉ có thể mượn về nhà tối đa ' . $max_book_remote . ' tài liệu';
        $msgMaxBookLocal = 'Chỉ có thể mượn tại chỗ tối đa ' . $max_book_local . ' tài liệu';
        $msgPermissionBook = 'Bạn đọc không có quyền mượn tài liệu này';
        $msgInvalidBookReturn = 'Tài liệu này không phải do bạn đọc ' . $reader->full_name . ' mượn, không thể trả';
        if (!empty($bookItem) && $bookItem->book->status == Book::SS_PUBLISHED) {
            $validReaderBook = $this->_checkReaderBook($reader->circulations, $bookItem->id);
            $valideMaxbook = $bookItem->book->book_scope == Book::SCOPE_LOCAL ?
                $this->_checkMaxBook($reader->circulations, Book::SCOPE_LOCAL, $max_book_local) :
                $this->_checkMaxBook($reader->circulations, Book::SCOPE_AWAY, $max_book_remote);
            $msgMaxBook = $bookItem->book->book_scope == Book::SCOPE_LOCAL ? $msgMaxBookLocal : $msgMaxBookRemote;
            $borrow = false;
            $return = false;
            $extra = false;
            $result['status'] = true;
            if ($reader->status != Reader::SS_PAUSED && $reader->status != Reader::SS_EXPIRED) {
                //can borrow and return
                if ($bookItem->status === BookItem::SS_STORAGED) {
                    if ($this->_checkPermission($reader->reader_type, $bookItem->book->permission)) {
                        if ($valideMaxbook) {
                            //borrow
                            $borrow = true;
                            $result['book_item_id'] = $bookItem->id;
                            $result['book_html'] = View::make('circulation.partials.book', array(
                                    'borrow' => $borrow,
                                    'return' => $return,
                                    'extra' => $extra,
                                    'bookItem' => $bookItem,
                                ))->render();
                        } else {
                            //error cannot borrow more book
                            $result['status'] = false;
                            $result['message'] = $msgMaxBook;
                        }
                    } else {
                        //error don't have permission to borrow book
                        $result['status'] = false;
                        $result['message'] = $msgPermissionBook;
                    }
                } else {
                    //return
                    if ($validReaderBook) {
                        //return
                        $return = true;
                        $circulation = Circulation::where('book_item_id', '=', $bookItem->id)
                            ->where('reader_id', '=', $readerId)
                            // ->where('returned', '=', false)
                            ->first();
                        if ($circulation->extensions < $max_extra_times) {
                            $extra = true;
                        }
                        $result['book_item_id'] = $bookItem->id;
                        $result['book_html'] = View::make('circulation.partials.book', array(
                                'borrow' => $borrow,
                                'return' => $return,
                                'extra' => $extra,
                                'bookItem' => $bookItem,
                            ))->render();
                    } else {
                        //error invalid book for returning
                        $result['status'] = false;
                        $result['message'] = $msgInvalidBookReturn;
                    }
                }
            } else {
                //can return only
                if ($bookItem->status == BookItem::SS_LENDED) {
                    if ($validReaderBook) {
                        //return
                        $return = true;
                        $result['book_item_id'] = $bookItem->id;
                        $result['book_html'] = View::make('circulation.partials.book', array(
                                'borrow' => $borrow,
                                'return' => $return,
                                'extra' => $extra,
                                'bookItem' => $bookItem,
                            ))->render();
                    } else {
                        //error invalid book for returning
                        $result['status'] = false;
                        $result['message'] = $msgInvalidBookReturn;
                    }
                } else {
                    //error can not borrow more book
                    $result['status'] = false;
                    $result['message'] = 'Bạn đọc này "' . strtolower(Reader::$SS_LABELS[$reader->status]) . '" không thể mượn tài liệu';
                }
            }
        } else {
            $result['status'] = false;
            $result['message'] = 'Không tìm thấy tài liệu với mã "' . $barcode . '"';
        }
        return Response::json($result);
    }

    private function _checkReaderBook($circulations, $bookItemId) {
        $tmp = array();
        foreach ($circulations as $circulation) {
            $tmp[] = $circulation->book_item_id;
        }
        if (in_array($bookItemId, $tmp)) {
            return true;
        } else {
            return false;
        }
    }

    private function _checkPermission($readerType, $permission) {
        $tmp = json_decode($permission, true);
        if (in_array($readerType, $tmp)) {
            return true;
        } else {
            return false;
        }
    }

    private function _checkMaxBook($circulations, $scope, $max) {
        $countByScope = $circulations->filter(function($item) use($scope) {
            if ($item->scope == $scope) {
                return $item;
            }
        });
        return ($countByScope->count() < $max);
    }

    public function borrow($scope) {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        $expired = $this->configs['book_expired'];
        Circulation::createCirculation($readerId, $bookItemId, $scope, $expired);
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        $cirCount = $this->_countCirculationScope($circulations);
        BookItem::where('id', '=', $bookItemId)->update(array('status' => BookItem::SS_LENDED));
        $bookItem = BookItem::where('id', $bookItemId)->first();
        Book::where('id', $bookItem->book_id)->increment('lended');
        Book::where('id', $bookItem->book_id)->increment('lend_count');
        $result['status'] = true;
        $viewData = array(
            'circulations' => $circulations,
            'message' => 'Mượn thành công tài liệu ',
        );
        $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
        $result['countLocal'] = $cirCount['local'];
        $result['countRemote'] = $cirCount['remote'];
        return Response::json($result);
    }

    public function returnBook() {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        Circulation::where('reader_id', '=', $readerId)
            ->where('book_item_id', '=', $bookItemId)
            ->where('returned', '=', false)
            ->update(array(
                'returned' => true,
                'returned_at' => Carbon\Carbon::now(),
        ));
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        $cirCount = $this->_countCirculationScope($circulations);
        BookItem::where('id', '=', $bookItemId)->update(array('status' => BookItem::SS_STORAGED));
        $bookItem = BookItem::where('id', $bookItemId)->first(array('book_id'));
        Book::where('id', $bookItem->book_id)->decrement('lended');
        $result['status'] = true;
        $viewData = array(
            'circulations' => $circulations,
            'message' => 'Trả thành công tài liệu ',
        );
        $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
        $result['countLocal'] = $cirCount['local'];
        $result['countRemote'] = $cirCount['remote'];
        return Response::json($result);
    }

    public function extra() {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        $book_more_time = $this->configs['book_more_time'];
        Circulation::where('book_item_id', '=', $bookItemId)
            ->where('reader_id', '=', $readerId)
            ->increment('extensions');
        $circulation = Circulation::where('book_item_id', '=', $bookItemId)
            ->where('reader_id', '=', $readerId)
            ->first();
        Circulation::where('book_item_id', '=', $bookItemId)
            ->where('reader_id', '=', $readerId)
            ->update(array('expired_at' => $circulation->expired_at->addDays($book_more_time->value)));
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        $result['status'] = true;
        $viewData = array(
            'circulations' => $circulations,
            'message' => 'Gia hạn công tài liệu ',
        );
        $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
        return Response::json($result);
    }

    public function lost() {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        Circulation::where('reader_id', '=', $readerId)
            ->where('book_item_id', '=', $bookItemId)
            ->where('returned', '=', false)
            ->update(array('is_lost' => true));
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->where('is_lost', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        $cirCount = $this->_countCirculationScope($circulations);
        BookItem::where('id', '=', $bookItemId)->update(array('status' => BookItem::SS_STORAGED));
        $bookItem = BookItem::where('id', $bookItemId)->first(array('book_id'));
        Book::where('id', $bookItem->book_id)->increment('lost');
        Book::where('id', $bookItem->book_id)->decrement('lended');
        $result['status'] = true;
        $viewData = array(
            'circulations' => $circulations,
            'message' => 'Lưu thành công tình trạng làm mất tài liệu ',
        );
        $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
        $result['countLocal'] = $cirCount['local'];
        $result['countRemote'] = $cirCount['remote'];
        return Response::json($result);
    }

}
