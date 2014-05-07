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
        self::SCOPE_LOCAL => 'Mượn tại chỗ',
        self::SCOPE_AWAY => 'Mượn về nhà',
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

}
