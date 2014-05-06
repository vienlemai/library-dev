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
                        ->where('created_by', '=', Auth::user()->id)
                        ->orderBy('submitted_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
                case Book::SS_PUBLISHED:
                    $books = Book::where('status', '=', $type)
                        ->where('created_by', '=', Auth::user()->id)
                        ->orderBy('published_at', 'desc')
                        ->paginate(self::ITEMS_PER_PAGE);
                    break;
                default:
                    $books = Book::where('status', '=', $type)
                        ->where('created_by', '=', Auth::user()->id)
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
                            ->where('created_by', '=', Auth::user()->id)
                            ->orderBy('submitted_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                    case Book::SS_PUBLISHED:
                        $books[$k] = Book::where('status', '=', $k)
                            ->where('created_by', '=', Auth::user()->id)
                            ->orderBy('published_at', 'desc')
                            ->paginate(self::ITEMS_PER_PAGE);
                        break;
                    default:
                        $books[$k] = Book::where('status', '=', $k)
                            ->where('created_by', '=', Auth::user()->id)
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
                ->where('created_by', '=', Auth::user()->id)
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
                    ->where('created_by', '=', Auth::user()->id)
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
                ->where('created_by', '=', Auth::user()->id)
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
                    ->where('created_by', '=', Auth::user()->id)
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
                    'type' => $type
            ));
        } else {
            return View::make('book.partials.create_magazine', array(
                    'storageOptions' => $storageOptions->render(),
                    'levels' => Book::$LEVELS,
                    'type' => $type
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
            $time = time();
            $vnCode = '893';
            $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 6);
            // If the 'fillable' array is defined, 
            // I think we don't need to assign the fields one by one from Input
            $book = new Book(Input::all());
            $book->barcode = $random;
            $book->book_type = $type;
            if ($book->save()) {
                for ($i = 1; $i <= $book->number; $i++) {
                    $code = $random . sprintf("%03s", $i);
                    $fullCode = $this->ean13_check_digit($code);
                    $bItem = new BookItem(array('barcode' => $fullCode, 'status' => BookItem::SS_STORAGED));
                    $book->bookItems()->save($bItem);
                }
                Session::flash('success', 'Tạo mới thành công tài liệu <strong>"'
                    . Input::get('title')
                    . '"</strong>, số lượng : <strong>'
                    . Input::get('number') . ' cuốn</strong>');
                return Redirect::route('book.catalog.view', $book->id);
            } else {
                Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
                return Redirect::route('book.create');
            }
        } else {
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

        //$user = Auth::user();
//		if ($book->created_by == $user->id) {
//			App::abort(404);
//		}
        $storageOptions = new Storage();
        $node = Storage::where('id', '=', $book->storage)->first();
        $path = $storageOptions->getPath($node);
        $this->layout->content = View::make('book.moderate-view', array('book' => $book, 'path' => $path));
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
            array_push($result, array('code' => $bookItem->barcode, 'barcode' => DNS1D::getBarcodePNGPath($bookItem->barcode, "EAN13", 1.5, 33)));
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
                'levels' => Book::$LEVELS
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

        $time = time();
        $vnCode = '893';
        # Why we don't use the old barcode ?
        $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 6);
        if ($v->passes()) {
            $book->update(Input::all());
            $book->barcode = $random;
            if ($book->status == Book::SS_DISAPPROVED) {
                $book->status = Book::SS_SUBMITED;
                Session::flash('success', 'Đã chỉnh sửa và gửi tài liệu <strong>"'
                    . Input::get('title')
                    . '"</strong>, số lượng : <strong>'
                    . Input::get('number') . ' cuốn</strong>');
            } else {
                Session::flash('success', 'Sửa thành công tài liệu <strong>"'
                    . Input::get('title')
                    . '"</strong>, số lượng : <strong>'
                    . Input::get('number') . ' cuốn</strong>');
            }
            if ($book->save()) {
                if ($book->number != Input::get('number')) {
                    BookItem::where('book_id', '=', $book->id)->delete();
                    $barcode = $book->barcode;
                    for ($i = 1; $i <= $book->number; $i++) {
                        $code = $barcode . sprintf("%03s", $i);
                        $fullCode = $this->ean13_check_digit($code);
                        $bItem = new BookItem(array('barcode' => $fullCode, 'status' => BookItem::SS_STORAGED));
                        $book->bookItems()->save($bItem);
                    }
                }
                return Redirect::route('book.catalog.view', $book->id);
            } else {
                Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
            }
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
        exit('deleting . . .');
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
        $book = Book::findOrFail($id);
        $book->publish();
        Session::flash('success', 'Đã lưu hành tài liệu ' . $book->title);
        return Redirect::route('book.moderate');
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

}
