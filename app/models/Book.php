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
        11 => 'organization',
        12 => 'language',
        13 => 'cutter',
        14 => 'type_number',
        15 => 'price',
        16 => 'storage',
        17 => 'number',
        18 => 'level',
        19 => 'scope',
        20 => 'permission',
        21 => 'another_infor'
    );
    public static $magazineTitle = array(
        1 => 'title',
        2 => 'magazine_number',
        3 => 'magazine_publish_day',
        4 => 'magazine_additional',
        5 => 'magazine_special',
        6 => 'magazine_local',
        7 => 'organization',
        8 => 'language',
        9 => 'cutter',
        10 => 'type_number',
        11 => 'price',
        12 => 'storage',
        13 => 'number',
        14 => 'level',
        15 => 'scope',
        16 => 'permission',
        17 => 'another_infor'
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
    //labels of a book for cataloger
    public static $CAT_SS_LABELS = array(
        0 => 'Đang biên mục',
        1 => 'Chưa xác nhận',
        2 => 'Lỗi',
        3 => 'Đã lưu hành',
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
        'cutter',
        'type_number',
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
    );

    public static function boot() {
        parent::boot();
        static::creating(function($book) {
            $book->status = Book::SS_ADDED;
            $book->created_by = Auth::user()->id;
            $book->barcode_printed = 0;
            $time = time();
            $vnCode = '893';
            $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 6);
            $book->barcode = $random;
        });
    }

    /*
     * Instance functions goes from here
     */

    public function submit() {
        $this->status = self::SS_SUBMITED;
        $this->submitted_at = Carbon\Carbon::now();
        $this->save();
        // Write submit book event
        Activity::write(Auth::user(), Activity::SUBMITED_BOOK, $this);
    }

    public function publish() {
        $this->status = self::SS_PUBLISHED;
        $this->published_at = Carbon\Carbon::now();
        $this->published_by = Auth::user()->id;
        $this->save();
        // Write publish book event
        Activity::write(Auth::user(), Activity::PUBLISHED_BOOK, $this);
    }

    public function disapprove($reason) {
        $this->status = self::SS_DISAPPROVED;
        $this->error_reason = $reason;
        $this->save();
        // Write disapprove book event
        Activity::write(Auth::user(), Activity::DISAPPROVED_BOOK, $this);
    }

    /*
     * Static functions goes from here
     */

    public static function bookValidate($input) {
        $rules = array(
            'title' => 'required|min:5',
            'author' => 'required',
            'number' => 'required|integer|min:1',
            'pages' => 'required|integer|min:1',
            'storage' => 'required',
        );

        $messages = array(
            'title.min' => 'tối thiểu :min ký tự',
            'min' => 'xin nhập tối thiểu :min',
            'required' => 'không được để trống',
            'integer' => 'xin nhập vào số nguyên'
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

    public static function magazineValidate($input) {
        $rules = array(
            'title' => 'required|min:5',
            'number' => 'required|integer|min:1',
            'storage' => 'required',
        );

        $messages = array(
            'title.min' => 'tối thiểu :min ký tự',
            'min' => 'xin nhập tối thiểu :min',
            'required' => 'không được để trống',
            'integer' => 'xin nhập vào số nguyên'
        );
        return Validator::make($input, $rules, $messages);
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

    public function scopeName() {
        $scope = self::$SCOPE_LABELS[$this->book_scope];
        return $scope;
    }

    public static function bookExcelValidate($input) {
        $rules = array(
            'title' => 'required',
            'author' => 'required',
            'number' => 'required|integer|min:1',
            'pages' => 'required|integer|min:1',
            'storage' => 'required',
            'level' => 'required|in:bình thường,mật,tối mật, tuyệt mật',
            'scope' => 'required|in:tại chỗ,về nhà',
            'permission' => 'required|bx_permission',
            'storage' => 'required|bx_storage'
        );
        $messages = array(
            'title.required' => 'Không được để trống tiêu đề',
            'author.required' => 'Không được để trống tác giả',
            'number.required' => 'Không được để trống số lượng tài liệu',
            'number.integer' => 'Số lượng phải là một số nguyên',
            'number.min' => 'Số lượng tối thiểu lớn hơn hoặc bằng 1',
            'pages.required' => 'Không được để trống số trang',
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
            'storage' => 'required',
            'level' => 'required|in:bình thường,mật,tối mật, tuyệt mật',
            'scope' => 'required|in:tại chỗ,về nhà',
            'permission' => 'required|bx_permission',
            'storage' => 'required|bx_storage'
        );
        $messages = array(
            'title.required' => 'Không được để trống tiêu đề',
            'author.required' => 'Không được để trống tác giả',
            'number.required' => 'Không được để trống số lượng tài liệu',
            'number.integer' => 'Số lượng phải là một số nguyên',
            'number.min' => 'Số lượng tối thiểu lớn hơn hoặc bằng 1',
            'pages.required' => 'Không được để trống số trang',
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

    public static function convertTitleToId($book) {
        //$bookTmp = $book;

        foreach (self::$LEVELS as $k => $v) {
            if (trim(strtolower($book['level'])) == strtolower($v)) {
                $book['level'] = $k;
                break;
            }
        }

        foreach (self::$SCOPE_LABELS as $k => $v) {
            if (trim(strtolower($book['scope'])) == strtolower($v)) {
                $book['scope'] = $k;
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

    public function saveBookItem() {
        for ($i = 1; $i <= $this->number; $i++) {
            $code = $this->barcode . sprintf("%03s", $i);
            $fullCode = self::ean13_check_digit($code);
            $bItem = new BookItem(array('barcode' => $fullCode, 'status' => BookItem::SS_STORAGED));
            $this->bookItems()->save($bItem);
        }
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

}
