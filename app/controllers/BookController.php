<?php

class BookController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    public $layout = 'layouts.admin';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Index page for cataloger
     * Display a listing of books that being catalog
     */
    public function catalog() {
        if (Request::ajax()) {
            $type = Input::get('book-type');
            switch ($type) {
                case Book::SS_SUBMITED:
                    $books = Book::where('status', '=', $type)
                        ->where('created_by', '=', Auth::user()->loginable_id)
                        ->orderBy('submitted_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
                case Book::SS_PUBLISHED:
                    $books = Book::where('status', '=', $type)
                        ->where('created_by', '=', Auth::user()->loginable_id)
                        ->orderBy('published_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
                default:
                    $books = Book::where('status', '=', $type)
                        ->where('created_by', '=', Auth::user()->loginable_id)
                        ->orderBy('updated_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
            }
            return View::make('book.partials.catalog.' . $type, array('books' => $books));
        } else {
            foreach (Book::$CAT_SS_LABELS as $k => $v) {
                $count[$k] = Book::where('status', '=', $k)->count();
            }
            foreach (Book::$CAT_SS_LABELS as $k => $v) {
                switch ($k) {
                    case Book::SS_SUBMITED:
                        $books[$k] = Book::where('status', '=', $k)
                            ->where('created_by', '=', Auth::user()->loginable_id)
                            ->orderBy('submitted_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                    case Book::SS_PUBLISHED:
                        $books[$k] = Book::where('status', '=', $k)
                            ->where('created_by', '=', Auth::user()->loginable_id)
                            ->orderBy('published_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                    default:
                        $books[$k] = Book::where('status', '=', $k)
                            ->where('created_by', '=', Auth::user()->loginable_id)
                            ->orderBy('updated_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                }
            }
            return View::make('book.catalog', array('books' => $books, 'count' => $count));
        }
    }

    /**
     * Search books for catologer, get bookType, and keyword form request
     */
    public function catalogSearch() {
        $type = Input::get('book-type');
        $keyword = Input::get('keyword');
        if (Request::ajax()) {
            $books = Book::where('status', '=', $type)
                ->where('created_by', '=', Auth::user()->loginable_id)
                ->where('title', 'LIKE', '%' . $keyword . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(self::ITEMS_PER_PAGE);
            return View::make('book.partials.catalog.' . $type, array('books' => $books, 'keyword' => $keyword));
        } else {
            foreach (Book::$CAT_SS_LABELS as $k => $v) {
                $count[$k] = Book::where('status', '=', $k)->count();
            }
            foreach (Book::$CAT_SS_LABELS as $k => $v) {
                $books[$k] = Book::where('status', '=', $k)
                    ->where('created_by', '=', Auth::user()->loginable_id)
                    ->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::ITEMS_PER_PAGE);
            }
            return View::make('book.catalog', array('books' => $books, 'count' => $count));
        }
    }

    public function library() {
        $books = Book::where('status', '=', Book::SS_PUBLISHED)
            ->orderBy('published_at', 'desc')
            ->paginate(self::ITEMS_PER_PAGE);
        if (Request::ajax()) {
            return View::make('book.partials.library.library', array('books' => $books));
        } else {
            return View::make('book.library', array('books' => $books));
        }
    }

    public function librarySearch() {
        $keyword = Input::get('keyword');
        $books = Book::where('status', '=', Book::SS_PUBLISHED)
            ->where('title', 'LIKE', '%' . $keyword . '%')
            ->orderBy('published_at', 'desc')
            ->paginate(self::ITEMS_PER_PAGE);
        if (Request::ajax()) {
            return View::make('book.partials.library.library', array('books' => $books, 'keyword' => $keyword));
        } else {
            return View::make('book.library', array('books' => $books, 'keyword' => $keyword));
        }
    }

    public function libraryView($id) {
        $book = Book::with('moderator', 'cataloger')->find($id);
        $storageOptions = new Storage();
        $node = Storage::where('id', '=', $book->storage)->first();
        $path = $storageOptions->getPath($node);
        if ($book->isBook()) {
            return View::make('book.partials.library.view_book', array('book' => $book, 'path' => $path));
        } else {
            return View::make('book.partials.library.view_magazine', array('book' => $book, 'path' => $path));
        }
    }

    /**
     * Index page for moderator
     * List all book that submitted, disapproved, published
     */
    public function moderate() {
        if (Request::ajax()) {
            $type = Input::get('book-type');
            switch ($type) {
                case Book::SS_SUBMITED:
                    $books = Book::where('status', '=', $type)
                        ->orderBy('submitted_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
                case Book::SS_PUBLISHED:
                    $books = Book::where('status', '=', $type)
                        ->orderBy('published_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
                default :
                    $books = Book::where('status', '=', $type)
                        ->orderBy('updated_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
            }
            return View::make('book.partials.moderate.' . $type, array('books' => $books));
        } else {
            foreach (Book::$MOD_SS_LABEL as $k => $v) {
                $count[$k] = Book::where('status', '=', $k)->count();
            }
            foreach (Book::$MOD_SS_LABEL as $k => $v) {
                switch ($k) {
                    case Book::SS_SUBMITED:
                        $books[$k] = Book::where('status', '=', $k)
                            ->orderBy('submitted_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                    case Book::SS_PUBLISHED:
                        $books[$k] = Book::where('status', '=', $k)
                            ->orderBy('published_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                    default :
                        $books[$k] = Book::where('status', '=', $k)
                            ->orderBy('updated_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                }
            }
            return View::make('book.moderate', array('books' => $books, 'count' => $count));
        }
    }

    /**
     * Search books for catologer, get bookType, and keyword form request
     */
    public function moderateSearch() {
        $type = Input::get('book-type');
        $keyword = Input::get('keyword');
        if (Request::ajax()) {
            $books = Book::where('status', '=', $type)
                ->where('created_by', '=', Auth::user()->loginable_id)
                ->where('title', 'LIKE', '%' . $keyword . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(self::ITEMS_PER_PAGE);
            return View::make('book.partials.moderate.' . $type, array('books' => $books, 'keyword' => $keyword));
        } else {
            foreach (Book::$CAT_SS_LABELS as $k => $v) {
                $count[$k] = Book::where('status', '=', $k)->count();
            }
            foreach (Book::$CAT_SS_LABELS as $k => $v) {
                $books[$k] = Book::where('status', '=', $k)
                    ->where('created_by', '=', Auth::user()->loginable_id)
                    ->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::ITEMS_PER_PAGE);
            }
            return View::make('book.catalog', array('books' => $books, 'count' => $count));
        }
    }

    /**
     * Add new book
     *
     * @return Response
     */
    public function create($type) {
        $storageOptions = new Storage();
        if ($type == Book::TYPE_BOOK) {
            return View::make('book.partials.create_book', array(
                    'storageOptions' => $storageOptions->render(),
                    'levels' => Book::$LEVELS,
                    'scopes' => Book::$SCOPE_LABELS,
                    'readerTypes' => Reader::$TYPE_LABELS,
            ));
        } else {
            return View::make('book.partials.create_magazine', array(
                    'storageOptions' => $storageOptions->render(),
                    'levels' => Book::$LEVELS,
                    'scopes' => Book::$SCOPE_LABELS,
                    'readerTypes' => Reader::$TYPE_LABELS,
            ));
        }
    }

    /**
     * Validate book data from from, if pass then save data to database
     */
    public function save($type) {
        if ($type == Book::TYPE_BOOK) {
            $v = Book::bookValidate(Input::all());
        } else {
            $v = Book::magazineValidate(Input::all());
        }
        if ($v->passes()) {
            $permission = json_encode(Input::get('permission'));
            $book = new Book(Input::all());
            $book->book_type = $type;
            $book->permission = $permission;
            if ($book->save()) {
                Session::flash('success', 'Tạo mới thành công tài liệu <strong>"'
                    . Input::get('title')
                    . '"</strong>, số lượng : <strong>'
                    . Input::get('number') . ' cuốn</strong>');

                $redirect = Input::get('redirect');
                if ($redirect == 'create') {
                    return Redirect::route('book.create', $type);
                } elseif ($redirect == 'index') {
                    return Redirect::route('book.catalog');
                }
                return Redirect::route('book.view', $book->id);
            } else {
                Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
                return Redirect::route('book.create');
            }
        } else {
            Session::flash('error', 'Đã có lỗi, vui lòng kiểm tra lại dữ liệu');
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    /**
     * Moderator view book when book is submitted
     */
    public function moderateView($bookId) {
        $book = Book::with('cataloger')->find($bookId);
        if ($book->status != Book::SS_SUBMITED) {
            Session::flash('error', 'Tài liệu không đúng, vui lòng kiểm tra lại');
            return Redirect::route('book.moderate');
        }
//        if ($book->created_by == Auth::user()->loginable_id) {
//            App::abort(404);
//        }
        $storageOptions = new Storage();
        $node = Storage::where('id', '=', $book->storage)->first();
        $path = $storageOptions->getPath($node);
        $this->layout->content = View::make('book.moderate-view', array(
                'book' => $book,
                'path' => $path,
        ));
    }

    public function catalogView($bookId) {
        $book = Book::findOrFail($bookId);
        $user = Auth::user();
        if ($book->created_by != $user->id) {
            App::abort(404);
        }
        $storageOptions = new Storage();
        $node = Storage::where('id', '=', $book->storage)->first();
        $path = $storageOptions->getPath($node);
        $this->layout->content = View::make('book.catalog_view', array(
                'book' => $book,
                'levels' => Book::$LEVELS,
                'path' => $path,
        ));
    }

    /**
     * Gennerate barcode
     */
    public function barcode($id) {
        $book = Book::with('bookItems')->get()->find($id);
        $result = array();
        foreach ($book->bookItems as $bookItem) {
            array_push($result, array(
                'code' => $bookItem->barcode,
                'barcode' => DNS1D::getBarcodePNGPath($bookItem->barcode, "EAN13", 2.0, 50)
            ));
        }
        return View::make('book.barcode', array('barcode' => $result, 'book' => $book));
    }

    /**
     * Show the form for editing the book
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($bookId) {
        $book = Book::findOrFail($bookId);
        $user = Auth::user();
        if ($book->created_by != $user->id) {
            Session::flash('error', 'Tài liệu không đúng, vui lòng kiểm tra lại');
            return Redirect::route('book.moderate');
        } else if ($book->status == Book::SS_SUBMITED || $book->status == Book::SS_PUBLISHED) {
            Session::flash('error', 'Tài liệu không đúng, vui lòng kiểm tra lại');
            return Redirect::route('book.moderate');
        }
        $storageOptions = new Storage();
        $this->layout->content = View::make('book.edit', array(
                'book' => $book,
                'storageOptions' => $storageOptions->render(),
                'levels' => Book::$LEVELS,
                'scopes' => Book::$SCOPE_LABELS,
                'readerTypes' => Reader::$TYPE_LABELS,
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {

        $book = Book::findOrFail($id);
        if ($book->isBook()) {
            $v = Book::bookValidate(Input::all());
        } else {
            $v = Book::magazineValidate(Input::all());
        }
        if ($v->passes()) {
            $permission = json_encode(Input::get('permission'));
            $book->permission = ($permission);
            $book->update(Input::except('permission'));
            if ($book->status == Book::SS_DISAPPROVED) {
                $book->status = Book::SS_SUBMITED;
                Session::flash('success', 'Đã chỉnh sửa và gửi tài liệu <strong>"'
                    . Input::get('title')
                    . '"</strong>, số lượng : <strong>'
                    . Input::get('number') . ' cuốn</strong>');
                $book->save();
            } else {
                Session::flash('success', 'Sửa thành công tài liệu <strong>"'
                    . Input::get('title')
                    . '"</strong>, số lượng : <strong>'
                    . Input::get('number') . ' cuốn</strong>');
            }
            if ($book->number != Input::get('number')) {
                BookItem::where('book_id', '=', $book->id)->delete();
                $book->saveBookItem();
            }
            return Redirect::route('book.catalog.view', $book->id);
        } else {
            return Redirect::route('book.edit', array($id))->withInput()->withErrors($v->messages());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        Session::flash('success', 'Xóa thành công tài liệu "' . $book->title . '"');
        return Redirect::route('book.catalog');
    }

    /**
     * Cateloger submit books for moderator to moderate
     */
    public function submit() {
        $input = Input::all();
        $books = Book::whereIn('id', $input['bookId'])->get();
        foreach ($books as $book) {
            $book->submit();
        }
        Session::flash('success', 'Gửi thành công ' . $books->count() . ' tài liệu');
        return Redirect::route('book.catalog');
    }

    /**
     * Moderator publish a book
     */
    public function publish($id) {
        if ($this->_checkInventory()) {
            $book = Book::findOrFail($id);
            $book->publish();
            Session::flash('success', 'Đã lưu hành tài liệu ' . $book->title);
            return Redirect::route('book.moderate');
        } else {
            return Redirect::route('error', array('inventory'));
        }
    }

    /**
     * Moderator disapprove a book
     */
    public function disapprove($id) {
        $book = Book::findOrFail($id);
        $book->disapprove(Input::get('reason'));
        Session::flash('success', 'Đã báo lỗi thành công tài liệu ' . $book->title);
        return Redirect::route('book.moderate');
    }

    public function getImport($type) {
        return View::make('book.import', array('type' => $type));
    }

    public function excelValidate($type) {
        $v = Book::excelValidate(Input::all());
        if ($v->passes()) {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'excels';
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath);
            }
            $fileName = Input::file('book')->getClientOriginalName();
            try {
                Input::file('book')->move($destinationPath, $fileName);
                $fullPath = $destinationPath . DIRECTORY_SEPARATOR . $fileName;
                $excelData = Excel::load($fullPath)->toArray();
                $bookData = array_shift($excelData);
                //dd($bookData);
                //unset($bookData[0]);
                $numberOfBooks = count($bookData);
                if ($type == Book::TYPE_BOOK) {
                    for ($i = 0; $i < $numberOfBooks; $i++) {
                        $dataValidate = array();
                        foreach (Book::$titleToExcel as $k => $v) {
                            $dataValidate[$v] = $bookData[$i] !== null ? strtolower(array_shift($bookData[$i])) : '';
                        }
                        $v = Book::bookExcelValidate($dataValidate);
                        if (!$v->passes()) {
                            return Redirect::back()->with('index', $i)->withErrors($v->messages());
                        }
                    }
                } else if ($type == Book::TYPE_MAGAZINE) {
                    for ($i = 0; $i < $numberOfBooks; $i++) {
                        $dataValidate = array();
                        foreach (Book::$magazineTitle as $k => $v) {
                            $dataValidate[$v] = $bookData[$i] !== null ? strtolower(array_shift($bookData[$i])) : '';
                        }
                        $v = Book::magazineExcelValidate($dataValidate);
                        if (!$v->passes()) {
                            return Redirect::back()->with('index', $i + 1)->withErrors($v->messages());
                        }
                    }
                }
                return View::make('book.import_info', array(
                        'type' => $type,
                        'fileName' => $fileName,
                        'numberOfBooks' => $numberOfBooks,
                        'filePath' => $fullPath,
                ));
            } catch (Exception $e) {
                dd($e);
                return View::make('admin.error', array(
                        'message' => 'Lỗi hệ thống vui lòng thử lại'
                ));
            }
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function postImport($type) {
        $filePath = Input::get('file_path');
        $excelData = Excel::load($filePath)->toArray();
        $bookData = array_shift($excelData);
        $numberOfBooks = count($bookData);
        for ($i = 0; $i < $numberOfBooks; $i++) {
            $bookToSave = array();
            if ($type == Book::TYPE_BOOK) {
                foreach (Book::$titleToExcel as $k => $v) {
                    $bookToSave[$v] = $bookData[$i] !== null ? (array_shift($bookData[$i])) : '';
                }
            } else if ($type == Book::TYPE_MAGAZINE) {
                foreach (Book::$magazineTitle as $k => $v) {
                    $bookToSave[$v] = $bookData[$i] !== null ? (array_shift($bookData[$i])) : '';
                }
            }
            $bookToSaveConverted = Book::convertTitleToId($bookToSave);
            $book = new Book($bookToSaveConverted);
            $book->book_type = $type;
            $book->save();
        }
        Session::flash('success', 'Lưu thành công ' . count($bookData) . ' tài liệu từ file excel');
        return Redirect::route('book.catalog');
    }

    public function exportChoose($permission) {
        //$listStatus = 1;
        if ($permission == User::TYPE_CATALOGER) {
            $listStatus = Book::$CAT_SS_LABELS;
        } else if ($permission == User::TYPE_MODERATOR) {
            $listStatus = Book::$MOD_SS_LABEL;
        } else if ($permission == User::TYPE_LIBRARIAN) {
            
        }
        return View::make('book.export_choose', array('listStatus' => $listStatus));
    }

    public function export() {
        $status = Input::get('status');
        if (empty($status)) {
            Session::flash('error', 'Bạn phải chọn ít nhất 1 loại tài liệu để xuất file excel');
            return Redirect::back();
        }
        $excel = Excel::create('Danh_sach_tai_lieu_' . Carbon\Carbon::now()->format('d_m_Y'));
        $count = 0;
        foreach ($status as $s) {
            $dataToExport = Book::dataForExcel($s);
            if (!empty($dataToExport)) {
                $excel->sheet(Book::getExcelSheetTitle($s))
                    ->with($dataToExport);
                $count++;
            }
        }
        if ($count == 0) {
            Session::flash('error', 'Hiện không có dữ liệu theo yêu cầu của bạn, không thể xuất file excel');
            return Redirect::back();
        }
        $excel->export('xls');
    }

    public function publishMany() {
        if ($this->_checkInventory()) {
            $bookIds = Input::get('bookIds');
            //dd($bookIds);
            try {
                foreach ($bookIds as $bookId) {
                    $book = Book::findOrFail($bookId);
                    $book->publish();
                }
            } catch (Exception $e) {
                dd($e);
                Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
                return Redirect::route('moderator');
            }
            Session::flash('success', 'Lưu hành thành công ' . count($bookIds) . ' tài liệu');
            return Redirect::route('book.moderate');
        } else {
            return Redirect::route('error', array('inventory'));
        }
    }

    public function label($id) {
        $bookItems = BookItem::with('book')
            ->where('book_id', $id)
            ->orderBy('sequence')
            ->get();
        $storageOptions = new Storage();
        $path = $storageOptions->supperRoot($bookItems[0]->book->storage);
        return View::make('book.label', array(
                'bookItems' => $bookItems,
                'path' => $path,
        ));
    }

}
