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
            $viewData = array(
                'reader' => $reader,
            );
            $result['reader_id'] = $reader->id;
            $result['reader_html'] = View::make('circulation.partials.reader', $viewData)->render();
            $viewData = array(
                'circulations' => $reader->circulations
            );
            $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
            $result['status'] = $reader->status;
            $result['books_borrowed'] = $reader->circulations->count();
        } else {
            $result['status'] = false;
            $result['message'] = 'Không tìm thấy bạn đọc với mã thẻ "' . $barcode . '"';
        }
        return Response::json($result);
    }

    public function loadBook() {
        $barcode = Input::get('barcode');
        $readerId = Input::get('readerId');
        $reader = Reader::where('id', '=', $readerId)->with('circulations', 'circulations.bookItem', 'circulations.bookItem.book')->first();
        $bookItem = BookItem::where('barcode', '=', $barcode)->with('book')->first();
        $result['status'] = true;
        if (!empty($bookItem)) {
            if ($bookItem->status == BookItem::SS_LENDED) {
                $circulation = Circulation::where('book_item_id', '=', $bookItem->id)
                    ->where('reader_id', '=', $reader->id)
                    ->where('returned', '=', false)
                    ->first();
                if (!empty($circulation)) {
                    //return book
                    $storageOptions = new Storage();
                    $node = Storage::where('id', '=', $bookItem->book->storage)->first();
                    $path = $storageOptions->getPath($node);
                    $result['book_item_id'] = $bookItem->id;
                    $result['book_html'] = View::make('circulation.partials.book', array(
                            'bookItem' => $bookItem,
                            'path' => $path,
                        ))->render();
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Tài liệu này không phải của bạn đọc ' . $reader->full_name . ' mượn';
                }
            } else {
                $max_book_remote = Session::get('LibConfig.max_book_remote');
                if (count($reader->circulations->count() > (int) $max_book_remote[0])) {
                    $result['status'] = false;
                    $result['message'] = 'Chỉ có thể mượn tối đa là ' . $max_book_remote[0] . ' tài liệu';
                } else {
                    //borrow book
                }
            }
        } else {
            $result['status'] = false;
            $result['message'] = 'Không tìm thấy tài liệu với mã "' . $barcode . '"';
        }
        return Response::json($result);
    }

    public function borrow() {
        $readerId = Input::get('readerId');
        $bookItemId = Input::get('bookItemId');
        $reader = Reader::find($readerId);
        $max_book_remote = Session::get('LibConfig.max_book_remote');
        if (count($reader->circulations > $max_book_remote[0])) {
            $circulation = new Circulation(array(
                'reader_id' => $readerId,
                'book_item_id' => $bookItemId,
            ));
            if ($circulation->save()) {
                $result['status'] = true;
                $viewData = array(
                    'circulations' => $reader->circulations,
                    'message' => 'Mượn thành công tài liệu '
                );
                $result['list_book_html'] = View::make('circulation.partials.list-book', $viewData)->render();
            }
        } else {
            $result['status'] = false;
            $result['message'] = 'Chỉ có thể mượn tối đa là ' . $max_book_remote[0] . ' tài liệu';
        }
        return Response::json($result);
    }

    public function returnBook() {
        
    }

}
