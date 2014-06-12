<?php

class Book extends Eloquent {
    /**
     * Table name
     */
    protected $table = 'books';

    /**
     * Status of a book
     */
    /**
     * Status SS_ADDED when cataloger add a book to database
     */
    const SS_ADDED = 0;

    /**
     * Status SS_SUBMITED when cataloger submit a book
     */
    const SS_SUBMITED = 1;

    /**
     * Status SS_DISAPPROVE when moderator disapprove for a book that submitted
     */
    const SS_DISAPPROVED = 2;

    /**
     * Status SS_PUBLISHED when moderator approve for a book, this book is publish
     */
    const SS_PUBLISHED = 3;

    /**
     * type book
     */
    const TYPE_BOOK = 1;

    /**
     * type magazine
     */
    const TYPE_MAGAZINE = 2;

    /**
     * book can only read at library
     */
    const SCOPE_LOCAL = 0;

    /**
     * book can borrow
     */
    const SCOPE_AWAY = 1;

    public static $titleToExcel = array(
        1 => 'title',
        2 => 'sub_title',
        3 => 'author',
        4 => 'translator',
        5 => 'publish_info',
        6 => 'publisher',
        7 => 'printer',
        8 => 'pages',
        9 => 'size',
        10 => 'attach',
        11 => 'year_publish',
        12 => 'organization',
        13 => 'language',
        14 => 'cutter',
        15 => 'type_number',
        16 => 'price',
        17 => 'storage',
        18 => 'number',
        19 => 'level',
        20 => 'book_scope',
        21 => 'permission',
        22 => 'another_infor'
    );
    public static $magazineTitle = array(
        1 => 'title',
        2 => 'magazine_number',
        3 => 'magazine_publish_day',
        4 => 'magazine_additional',
        5 => 'magazine_special',
        6 => 'magazine_local',
        7 => 'year_publish',
        8 => 'organization',
        9 => 'language',
        10 => 'cutter',
        11 => 'type_number',
        12 => 'price',
        13 => 'storage',
        14 => 'number',
        15 => 'level',
        16 => 'book_scope',
        17 => 'permission',
        18 => 'another_infor'
    );
    public static $storageTitle = array(
        1 => 'Kho A',
        3 => 'Luật',
        4 => 'Tham Khảo',
        5 => 'Nghiệp vụ cơ bản',
        7 => 'Đường thủy',
        8 => 'Đường bộ - Đường sắt',
        9 => 'Cảnh sát môi trường',
        10 => 'Cảnh sát kinh tế',
        11 => 'Kỹ thuật hình sự',
        12 => 'CA phụ trách xã'
    );
    private static $bookDBToTitle = array(
        'title' => 'Nhan đề',
        'sub_title' => 'Nhan đề song song',
        'author' => 'Tác giả',
        'translator' => 'Dịch giả',
        'publish_info' => 'Thông tin xuất bản',
        'publisher' => 'Nhà xuất bản',
        'printer' => 'Nhà in',
        'pages' => 'Số trang',
        'size' => 'Kích cỡ',
        'attach' => 'Tài liệu đính kèm',
        'year_publish' => 'Năm xuất bản',
        'organization' => 'Mã cơ quan',
        'language' => 'Ngôn ngữ',
        'cutter' => 'Số cutter',
        'type_number' => 'Số phân loại',
        'price' => 'Giá',
        'storage' => 'Nơi lưu trữ',
        'number' => 'Số lượng',
        'level' => 'Mức độ',
        'book_scope' => 'Phạm vi mượn',
        'permission' => 'Quyền mượn',
        'another_infor' => 'Thông tin khác',
    );
    private static $magazineDBToTitle = array(
        'title' => 'Nhan đề',
        'magazine_number' => 'Số tạp chí',
        'magazine_publish_day' => 'Ngày ra tạp chí',
        'magazine_additional' => 'Phụ trương',
        'magazine_special' => 'Số đặc biệt',
        'magazine_local' => 'Khu vực',
        'year_publish' => 'Năm xuất bản',
        'organization' => 'Mã cơ quan',
        'language' => 'Ngôn ngữ',
        'cutter' => 'Số cutter',
        'type_number' => 'Số phân loại',
        'price' => 'Giá',
        'storage' => 'Nơi lưu trữ',
        'number' => 'Số lượng',
        'level' => 'Mức độ',
        'book_scope' => 'Phạm vi mượn',
        'permission' => 'Quyền mượn',
        'another_infor' => 'Thông tin khác',
    );
    //labels of a book for cataloger
    public static $CAT_SS_LABELS = array(
        0 => 'Đang biên mục',
        1 => 'Chưa xác nhận',
        2 => 'Lỗi',
        3 => 'Đã lưu hành',
    );
    public $mapStorage = array(
        1 => 'Tài liệu tham khảo',
        3 => 'Tư liệu giáo khoa/Luật',
        4 => 'Tư liệu giáo khoa/Tham khảo',
        5 => 'Tư liệu giáo khoa/Nghiệp vụ cơ bản',
        7 => 'Tư liệu giáo khoa/Chuyên ngành/Đường thủy',
        8 => 'Tư liệu giáo khoa/Chuyên ngành/Đường bộ - Đường sắt',
        9 => 'Tư liệu giáo khoa/Chuyên ngành/Ma túy',
        10 => 'Tư liệu giáo khoa/Chuyên ngành/Hình sự',
        11 => 'Tư liệu giáo khoa/Chuyên ngành/Quản lý hành chính',
    );

    /**
     * labels of a book for moderator
     */
    public static $MOD_SS_LABEL = array(
        1 => 'Đã gửi lên',
        2 => 'Đã báo lỗi',
        3 => 'Đã lưu hành',
    );
    public static $LEVELS = array(
        1 => 'Bình thường',
        2 => 'Mật',
        3 => 'Tối mật',
        4 => 'Tuyệt mật'
    );
    public static $SCOPE_LABELS = array(
        self::SCOPE_LOCAL => 'Tại chỗ',
        self::SCOPE_AWAY => 'Về nhà',
    );
    public static $TYPE_TO_LABELS = array(
        self::TYPE_BOOK => 'Sách',
        self::TYPE_MAGAZINE => 'Tạp chí / Biểu mẫu'
    );

    public function getDates() {
        return array_merge(parent::getDates(), array('submitted_at', 'published_at'));
    }

    public function bookItems() {
        return $this->hasMany('BookItem');
    }

    public function cataloger() {
        return $this->belongsTo('User', 'created_by');
    }

    public function moderator() {
        return $this->belongsTo('User', 'published_by');
    }

    /*
     * Scopes
     */

    public function scopeBooks($query) {
        return $query->where('book_type', self::TYPE_BOOK);
    }

    public function scopeMagazines($query) {
        return $query->where('book_type', self::TYPE_MAGAZINE);
    }

    /**
     * Security fillable
     */
    protected $guard = array(
        'id', 'barcode', 'created_by', 'status'
    );
    protected $fillable = array(
        'barcode',
        'title',
        'sub_title',
        'author',
        'translator',
        'publish_info',
        'publisher',
        'printer',
        'pages',
        'size',
        'attach',
        'organization',
        'language',
        'type_number',
        'cutter',
        'price',
        'storage',
        'number',
        'level',
        'another_infor',
        'status',
        'magazine_number',
        'magazine_publish_day',
        'magazine_additional',
        'magazine_special',
        'magazine_local',
        'book_type',
        'book_scope',
        'permission',
        'year_publish'
    );

    public static function boot() {
        parent::boot();
        static::creating(function($book) {
            $book->status = Book::SS_ADDED;
            $book->created_by = Auth::user()->loginable_id;
            $book->barcode_printed = 0;
            $time = time();
            $vnCode = '893';
            $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 6);
            $book->barcode = $random;
        });
        static::created(function($book) {
            $bookTypeControl = DB::table('book_type_controls')
                ->where('book_type_number', $book->type_number)
                ->first();
            if ($bookTypeControl === null) {
                $start = 0;
                DB::table('book_type_controls')
                    ->insert(array(
                        'book_id' => $book->id,
                        'book_type_number' => $book->type_number,
                        'max' => $book->number,
                ));
            } else {
                $max = $bookTypeControl->max;
                $start = $max;
                DB::table('book_type_controls')
                    ->where('book_type_number', $book->type_number)
                    ->update(array(
                        'max' => $max + $book->number,
                ));
            }
            $book->saveBookItem($start);
        });
    }

    public function saveBookItem($start) {
        for ($i = 1; $i <= $this->number; $i++) {
            $code = $this->barcode . sprintf("%03s", ++$start);
            $fullCode = self::ean13_check_digit($code);
            $bItem = new BookItem(array(
                'barcode' => $fullCode,
                'status' => BookItem::SS_STORAGED,
                'sequence' => $start,
                'book_id' => $this->id,
            ));
            $bItem->save();
        }
    }

    public function updateNumer($number) {
        $this->number = $this->number + $number;
        $this->save();
        $bookTypeControll = DB::table('book_type_controls')
            ->where('book_type_number', $this->type_number)
            ->first();
        $max = $bookTypeControll->max;
        DB::table('book_type_controls')
            ->where('book_type_number', $this->type_number)
            ->update(array('max' => $max + $number));
        $this->saveBookItem($max, $number);
    }

    public function scopeStudent($query) {
        return $query->where('permission', 'LIKE', '%' . Reader::TYPE_STUDENT . '%');
    }

    public function scopeTeacher($query) {
        return $query->where('permission', 'LIKE', '%' . Reader::TYPE_TEACHER . '%');
    }

    public function scopeStaff($query) {
        return $query->where('permission', 'LIKE', '%' . Reader::TYPE_STAFF . '%');
    }

    public function scopeOfReaderType($query, $readerType) {
        return $query->where('permission', 'LIKE', '%' . $readerType . '%');
    }

    public function scopeName() {
        $scope = self::$SCOPE_LABELS[$this->book_scope];
        return $scope;
    }

    /*
     * Instance functions goes from here
     */

    public function submit() {
        $this->status = self::SS_SUBMITED;
        $this->submitted_at = Carbon\Carbon::now();
        $this->save();
        // Write submit book event
        Activity::write(Session::get('User'), Activity::SUBMITED_BOOK, $this);
    }

    public function publish() {
        $this->status = self::SS_PUBLISHED;
        $this->published_at = Carbon\Carbon::now();
        $this->published_by = Auth::user()->loginable_id;
        $bookTypeControl = DB::table('book_type_controls')
            ->where('book_type_number', $this->type_number)
            ->first();
        if ($this->id != $bookTypeControl->book_id) {
            $oldBook = Book::where('id', $bookTypeControl->book_id)
                ->where('status', self::SS_PUBLISHED)
                ->first();
            if ($oldBook !== null) {
                $oldNumber = $oldBook->number;
                $oldBook->number = $oldNumber + $this->number;
                $oldBook->save();
                BookItem::where('book_id', $this->id)
                    ->update(array(
                        'book_id' => $oldBook->id,
                ));
                $this->delete();
            } else {
                DB::table('book_type_controls')
                    ->where('book_type_number', $this->type_number)
                    ->update(array('book_id' => $this->id));
                $this->save();
            }
        } else {
            $this->save();
        }

        // Write publish book event
        Activity::write(Session::get('User'), Activity::PUBLISHED_BOOK, $this);
    }

    public function disapprove($reason) {
        $this->status = self::SS_DISAPPROVED;
        $this->error_reason = $reason;
        $this->save();
        // Write disapprove book event
        Activity::write(Session::get('User'), Activity::DISAPPROVED_BOOK, $this);
    }

    public function representString() {
        return $this->title;
    }

    public function isBook() {
        return $this->book_type == self::TYPE_BOOK;
    }

    public function isMagazine() {
        return $this->book_type == self::TYPE_MAGAZINE;
    }

    public function permissionName() {
        $permission = json_decode($this->permission);
        $perArray = Reader::$TYPE_LABELS;
        foreach (Reader::$TYPE_LABELS as $k => $v) {
            if (!in_array($k, $permission)) {
                unset($perArray[$k]);
            }
        }
        return implode(', ', $perArray);
    }

    public function getBookTypeName() {
        return self::$TYPE_TO_LABELS[$this->book_type];
    }

//    public function getTitleAttribute($value) {
//        return ucwords($value);
//    }



    public static function search($params) {
        $query = self::select('books.*');
        if (isset($params['storage']) && $params['storage'] != 'all') {
            $query = $query->where('storage', '=', $params['storage']);
        }
        if (isset($params['keyword']) && $params['keyword'] != '') {
            $query = $query->where(function($query) use($params) {
                $query->where('title', 'LIKE', '%' . $params['keyword'] . '%');
                $query->orWhere('author', 'LIKE', '%' . $params['keyword'] . '%');
            });
        }
        if (isset($params['reader_type'])) {
            $query = $query->where('permission', 'LIKE', '%' . $params['reader_type'] . '%');
        }
        if (isset($params['type']) && $params['type'] != 'all') {
            $query = $query->where('book_type', '=', $params['type']);
        }
        if (isset($params['storage']) && $params['storage'] != 'all') {
            $query = $query->where('storage', '=', $params['storage']);
        }

        return $query;
    }

    public static function newest() {
        return self::level(array(2, 3, 4))
                ->orderBy('published_at', 'DESC')
                ->publish()
                ->take(5)
                ->get();
    }

    public static function topBorrowing() {
        return self::level(array(2, 3, 4))
                ->orderBy('lend_count', 'DESC')
                ->publish()
                ->take(5)
                ->get();
    }

    public function scopeLevel($query, $levels = array()) {
        if (!empty($levels)) {
            $query->whereNotIn('level', $levels);
        }
    }

    public static function searchForReader($reader, $params = array()) {
        $query = self::filterByReaderType($reader);
        if (isset($params['keyword'])) {
            $query = self::searchInTitle($query, $params['keyword']);
        }
        return $query;
    }

    // Search in title
    public static function searchInTitle($query, $keyword) {
        return $query->where('title', 'LIKE', '%' . $keyword . '%');
    }

    public static function filterByReaderType($reader) {
        return self::where('permission', 'LIKE', '%' . $reader->reader_type . '%');
    }

    public function scopeStorage($query, $storage) {
        return $query->where('storage', $storage);
    }

    /*
     * STATIC FUNCTIONS GOES FROM HERE
     */

    public static function findBorrowingByReader($reader) {
        return Circulation::where('reader_id', $reader->id)->with('bookItem.book')
                ->where('returned', '0')
                ->lists('books.id');
    }

    public static function bookValidate($input) {
        $rules = array(
            'title' => 'required|min:5',
            'author' => 'required',
            'number' => 'required|integer|min:1',
            'pages' => 'required|integer|min:1',
            'storage' => 'required',
            'cutter' => 'required',
            'type_number' => 'required',
            'year_publish' => 'required|integer',
        );

        $messages = array(
            'title.min' => 'tối thiểu :min ký tự',
            'min' => 'xin nhập tối thiểu :min',
            'required' => 'không được để trống',
            'integer' => 'xin nhập vào số nguyên',
            'cutter.required' => 'Không được để trống số cutter',
            'type_number.required' => 'Không được để trống số phân loại',
            'year_publish.required' => 'Không được để trống năm xuất bản'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function magazineValidate($input) {
        $rules = array(
            'title' => 'required|min:5',
            'number' => 'required|integer|min:1',
            'storage' => 'required',
            'cutter' => 'required',
            'type_number' => 'required',
            'year_publish' => 'required|integer',
        );

        $messages = array(
            'title.min' => 'tối thiểu :min ký tự',
            'min' => 'xin nhập tối thiểu :min',
            'required' => 'không được để trống',
            'integer' => 'xin nhập vào số nguyên',
            'cutter.required' => 'Không được để trống số cutter',
            'type_number.required' => 'Không được để trống số phân loại',
            'year_publish.required' => 'Không được để trống năm xuất bản'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function excelValidate($input) {
        $rules = array(
            'book' => 'required|mimes:xls,xlsx|max:10000'
        );
        $messages = array(
            'book.required' => 'Phải chọn file',
            'book.mimes' => 'Phải chọn file excel với định dạng xls, xlsx',
            'book.max' => 'Chỉ được chọn file nhỏ hơn 10MB'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function bookExcelValidate($input) {
        $rules = array(
            'title' => 'required',
            'author' => 'required',
            'number' => 'required|integer|min:1',
            'cutter' => 'required',
            'year_publish' => 'required|integer',
            'type_number' => 'required',
            'pages' => 'required|integer|min:1',
            'storage' => 'required',
            'level' => 'required|in:bình thường,mật,tối mật, tuyệt mật',
            'book_scope' => 'required|in:tại chỗ,về nhà',
            'permission' => 'required|bx_permission',
            'storage' => 'required|bx_storage'
        );
        $messages = array(
            'title.required' => 'Không được để trống tiêu đề',
            'author.required' => 'Không được để trống tác giả',
            'cutter.required' => 'Không được để trống số cutter',
            'type_number.required' => 'Không được để trống số phân loại',
            'number.required' => 'Không được để trống số lượng tài liệu',
            'number.integer' => 'Số lượng phải là một số nguyên',
            'number.min' => 'Số lượng tối thiểu lớn hơn hoặc bằng 1',
            'pages.required' => 'Không được để trống số trang',
            'year_publish.integer' => 'Năm xuất bản phải là một số nguyên dương',
            'year_publish.required' => 'Năm xuất bản không được để trống',
            'pages.integer' => 'Số trang phải là một số nguyên',
            'pages.min' => 'Số trang phải lớn hơn 0',
            'level.in' => 'Mức độ tài liệu phải thuộc một trong các giá trị: bình thường, mật, tối mật, tuyệt mật',
            'scope.required' => 'Không được để trống phạm vi mượn',
            'scope.in' => 'Phạm vi mượn không hợp lệ, phải thuộc một trong các giá trị: tại chỗ, về nhà',
            'permission.required' => 'Không được để trống quyền mượn',
            'permission.bx_permission' => 'Đối tượng được mượn không hợp lệ',
            'storage.required' => 'Không được để trống nơi lưu trữ',
            'storage.bx_storage' => 'Nơi lưu trữ không hợp lệ'
        );

        return Validator::make($input, $rules, $messages);
    }

    public static function magazineExcelValidate($input) {
        $rules = array(
            'title' => 'required',
            'number' => 'required|integer|min:1',
            'year_publish' => 'required|integer',
            'cutter' => 'required',
            'type_number' => 'required',
            'storage' => 'required',
            'level' => 'in:bình thường,mật,tối mật, tuyệt mật',
            'book_scope' => 'in:tại chỗ,về nhà',
            'permission' => 'bx_permission',
            'storage' => 'bx_storage'
        );
        $messages = array(
            'title.required' => 'Không được để trống tiêu đề',
            'author.required' => 'Không được để trống tác giả',
            'cutter.required' => 'Không được để trống số cutter',
            'type_number.required' => 'Không được để trống số phân loại',
            'number.required' => 'Không được để trống số lượng tài liệu',
            'number.integer' => 'Số lượng phải là một số nguyên',
            'number.min' => 'Số lượng tối thiểu lớn hơn hoặc bằng 1',
            'pages.required' => 'Không được để trống số trang',
            'pages.integer' => 'Số trang phải là một số nguyên',
            'pages.min' => 'Số trang phải lớn hơn 0',
            'year_publish.required' => 'Năm xuất bản không được để trống',
            'year_publish.integer' => 'Năm xuất bản phải là một số nguyên dương',
            'level.in' => 'Mức độ tài liệu phải thuộc một trong các giá trị: bình thường, mật, tối mật, tuyệt mật',
            'scope.in' => 'Phạm vi mượn không hợp lệ, phải thuộc một trong các giá trị: tại chỗ, về nhà',
            'permission.bx_permission' => 'Đối tượng được mượn không hợp lệ',
            'storage.required' => 'Không được để trống nơi lưu trữ',
            'storage.bx_storage' => 'Nơi lưu trữ không hợp lệ'
        );

        return Validator::make($input, $rules, $messages);
    }

    public static function convertTitleToId($book) {
        //$bookTmp = $book;

        foreach (self::$LEVELS as $k => $v) {
            if (trim(strtolower($book['level'])) == strtolower($v)) {
                $book['level'] = $k;
                break;
            }
        }
        foreach (self::$SCOPE_LABELS as $k => $v) {
            var_dump($k);
            var_dump(strtolower($v));
            if (trim(strtolower($book['book_scope'])) == strtolower($v)) {
                $book['book_scope'] = $k;
                break;
            }
        }

        foreach (self::$storageTitle as $k => $v) {
            if (trim(strtolower($book['storage'])) == strtolower($v)) {
                $book['storage'] = $k;
                break;
            }
        }
        foreach (Reader::$TYPE_LABELS as $k => $v) {
            $book['permission'] = str_ireplace($v, $k, $book['permission']);
        }
        $book['permission'] = '[' . $book['permission'] . ']';
        return $book;
    }

    public static function convertPermission($permission) {
        foreach (Reader::$TYPE_LABELS as $k => $v) {
            $permission = str_ireplace($k, $v, $permission);
        }
        $permission = substr($permission, 1, strlen($permission) - 2);
        return $permission;
    }

    /**
     * Generate the last digit number for barcode
     */
    public static function ean13_check_digit($digits) {
        $digits = (string) $digits;
        $even_sum = $digits{1} + $digits{3} + $digits{5} + $digits{7} + $digits{9} + $digits{11};
        $even_sum_three = $even_sum * 3;
        $odd_sum = $digits{0} + $digits{2} + $digits{4} + $digits{6} + $digits{8} + $digits{10};
        $total_sum = $even_sum_three + $odd_sum;
        $next_ten = (ceil($total_sum / 10)) * 10;
        $check_digit = $next_ten - $total_sum;
        return $digits . $check_digit;
    }

    public static function dataForExcel($type) {
        $books = Book::where('status', $type)
            ->where('book_type', Book::TYPE_BOOK)
            ->get();
        $dataToExport = array();
        if (!$books->isEmpty()) {
            $titles = array();
            array_push($dataToExport, array('Sách'));
            foreach (Book::$titleToExcel as $k => $v) {
                array_push($titles, self::$bookDBToTitle[$v]);
            }
            array_push($dataToExport, $titles);
            foreach ($books as $book) {
                $bookData = array();
                array_push($bookData, $book->title);
                array_push($bookData, $book->sub_title);
                array_push($bookData, $book->author);
                array_push($bookData, $book->translator);
                array_push($bookData, $book->publish_info);
                array_push($bookData, $book->publisher);
                array_push($bookData, $book->printer);
                array_push($bookData, $book->pages);
                array_push($bookData, $book->size);
                array_push($bookData, $book->attach);
                array_push($bookData, $book->organization);
                array_push($bookData, $book->language);
                array_push($bookData, $book->cutter);
                array_push($bookData, $book->type_number);
                array_push($bookData, $book->price);
                array_push($bookData, self::$storageTitle[$book->storage]);
                array_push($bookData, $book->number);
                array_push($bookData, self::$LEVELS[$book->level]);
                array_push($bookData, self::$SCOPE_LABELS[$book->book_scope]);
                array_push($bookData, self::convertPermission($book->permission));
                array_push($bookData, $book->another_infor);
                array_push($dataToExport, $bookData);
            }
        }
        $magazines = Book::where('status', $type)
            ->where('book_type', Book::TYPE_MAGAZINE)
            ->get();
        if (!$books->isEmpty()) {
            $mtitles = array();
            foreach (Book::$magazineTitle as $k => $v) {
                array_push($mtitles, self::$magazineDBToTitle[$v]);
            }
            array_push($dataToExport, array('Tạp chí/Biểu mẫu'));
            array_push($dataToExport, $mtitles);
            foreach ($magazines as $book) {
                $bookData = array();
                array_push($bookData, $book->title);
                array_push($bookData, $book->magazine_number);
                array_push($bookData, $book->magazine_publish_day);
                array_push($bookData, $book->magazine_additional);
                array_push($bookData, $book->magazine_special);
                array_push($bookData, $book->magazine_local);
                array_push($bookData, $book->organization);
                array_push($bookData, $book->language);
                array_push($bookData, $book->cutter);
                array_push($bookData, $book->type_number);
                array_push($bookData, $book->price);
                array_push($bookData, self::$storageTitle[$book->storage]);
                array_push($bookData, $book->number);
                array_push($bookData, self::$LEVELS[$book->level]);
                array_push($bookData, self::$SCOPE_LABELS[$book->book_scope]);
                array_push($bookData, self::convertPermission($book->permission));
                array_push($bookData, $book->another_infor);
                array_push($dataToExport, $bookData);
            }
        }
        return $dataToExport;
    }

    public static function getExcelSheetTitle($bookStatus) {
        switch ($bookStatus) {
            case self::SS_ADDED:
                return 'Tai_Lieu_Dang_Bien_Muc';
            case self::SS_DISAPPROVED:
                return 'Tai_Lieu_Loi';
            case self::SS_SUBMITED:
                return 'Tai_Lieu_Dang_Cho_Kiem_Duyet';
            case self::SS_PUBLISHED:
                return 'Tai_Lieu_Da_Luu_Hanh';
        }
    }

    public function getPath() {
        return $this->mapStorage[$this->storage];
    }

    public function getLevelName() {
        return self::$LEVELS[$this->level];
    }

    public function isAway() {
        return $this->scope == self::SCOPE_AWAY;
    }

    public function scopePublish($query) {
        return $query->where('status', self::SS_PUBLISHED);
    }

    public function scopePermission($query, $readerType) {
        return $query->where('permission', 'like', '%' . $readerType . '%');
    }

}
