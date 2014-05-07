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
        return View::make('circulation.index');
    }

    public function loadReader() {
        $barcode = Input::get('barcode');
        $reader = Reader::where('barcode', '=', $barcode)->with('circulations', 'circulations.bookItem', 'circulations.bookItem.book')->first();
        if (!empty($reader)) {
            $result['status'] = true;
            $now = Carbon\Carbon::now();
            $bookFine = Session::get('LibConfig.book_expired_fine');
            $fine = 0;
            $booksExpired = 0;
            foreach ($reader->circulations as $row) {
                if (!$now->lt($row->expired_at)) {
                    $diff = $now->diffInDays($row->expired_at);
                    $fine += ($diff * $bookFine);
                    $booksExpired++;
                }
            }
            // var_dump($fine);
            //exit();
            $viewData = array(
                'reader' => $reader,
                'msgFine' => $fine ? $msgFine = 'Trễ hạn ' . $booksExpired . ' tài liệu, tiền phạt : ' . $fine . '(đồng)' : ''
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
        $max_book_remote = Session::get('LibConfig.max_book_remote');
        $max_extra_times = Session::get('LibConfig.extra_times');
        $msgMaxBook = 'Chỉ có thể mượn tối đa là ' . $max_book_remote . ' tài liệu';
        $msgPermissionBook = 'Bạn đọc không có quyền mượn tài liệu này';
        $msgInvalidBookReturn = 'Tài liệu này không phải do bạn đọc ' . $reader->full_name . ' mượn, không thể trả';
        if (!empty($bookItem) && $bookItem->book->status == Book::SS_PUBLISHED) {
            $validReaderBook = $this->_checkReaderBook($reader->circulations, $bookItem->id);
            $valideMaxbook = $this->_checkMaxBook($reader->circulations, $max_book_remote);
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
                    $result['message'] = 'Bạn đọc này không thể mượn tài liệu';
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

    private function _checkMaxBook($circulations, $max) {
        return ($circulations->count() < $max);
    }

    public function borrow($scope) {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        Circulation::createCirculation($readerId, $bookItemId, $scope);
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        BookItem::where('id', '=', $bookItemId)->update(array('status' => BookItem::SS_LENDED));
        $result['status'] = true;
        $viewData = array(
            'circulations' => $circulations,
            'message' => 'Mượn thành công tài liệu '
        );
        $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
        return Response::json($result);
    }

    public function returnBook() {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        Circulation::where('reader_id', '=', $readerId)
            ->where('book_item_id', '=', $bookItemId)
            ->where('returned', '=', false)
            ->update(array('returned' => true));
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        BookItem::where('id', '=', $bookItemId)->update(array('status' => BookItem::SS_STORAGED));
        $result['status'] = true;
        $viewData = array(
            'circulations' => $circulations,
            'message' => 'Trả thành công tài liệu ',
        );
        $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
        return Response::json($result);
    }

    public function extra() {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        $book_more_time = Session::get('LibConfig.book_more_time');
        Circulation::where('book_item_id', '=', $bookItemId)
            ->where('reader_id', '=', $readerId)
            ->increment('extensions');
        $circulation = Circulation::where('book_item_id', '=', $bookItemId)
            ->where('reader_id', '=', $readerId)
            ->first();
        Circulation::where('book_item_id', '=', $bookItemId)
            ->where('reader_id', '=', $readerId)
            ->update(array('expired_at' => $circulation->expired_at->addDays($book_more_time)));
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

}
