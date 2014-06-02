<?php

class Reader extends Eloquent implements IActivityAuthor {
    /**
     * Table name
     */
    protected $table = 'readers';

    /**
     * Status of a reader
     */
    /**
     * Status SS_CIRCULATING reader is able to borrow books
     */
    const SS_CIRCULATED = 0;

    /**
     * Status SS_PAUSING reader is unable to borrow books
     */
    const SS_PAUSED = 1;

    /**
     * Status SS_EXPIRED reader is expired
     */
    const SS_EXPIRED = 2;

    /**
     * Status SS_EXPIRED_BOOK reader have books that expired
     */
    const SS_EXPIRED_BOOK = 3;

    /**
     * teacher
     */
    const TYPE_TEACHER = 1;

    /**
     * staff
     */
    const TYPE_STAFF = 2;

    /**
     * student
     */
    const TYPE_STUDENT = 3;

    /**
     * Avatar directory relative path
     */
    const AVATAR_DIR_PATH = 'img/readers/';

    public static $TYPE_LABELS = array(
        self::TYPE_STUDENT => 'Học viên',
        self::TYPE_TEACHER => 'Giảng viên',
        self::TYPE_STAFF => 'Nhân viên',
    );
    public static $LABELS = array(
        self::SS_CIRCULATED => 'Đang lưu thông',
        self::SS_PAUSED => 'Đang bị khóa'
    );
    public static $SS_LABELS = array(
        self::SS_CIRCULATED => 'Đang lưu thông',
        self::SS_PAUSED => 'Đang bị khóa',
        self::SS_EXPIRED_BOOK => 'Đang trễ hạn trả sách',
        self::SS_EXPIRED => 'Hết hạn'
    );

    public function getDates() {
        return array_merge(parent::getDates(), array('expired_at'));
    }

    public function bookItems() {
        return $this->hasMany('BookItem');
    }

    public function activities() {
        return $this->morphMany('Activity', 'author');
    }

    public function account() {
        return $this->morphOne('Account', 'loginable');
    }

    /**
     * Find the books has borrowed and still not retured
     * 
     */
    public function borrowingBooks() {
        return Book::findBorrowingByReader($this);
    }

    /**
     * Security fillable
     */
    protected $fillable = array(
        'full_name',
        'class',
        'year_of_birth',
        'hometown',
        'school_year',
        'subject',
        'email',
        'phone',
        'avatar',
        'reader_type',
        'department',
        'card_number'
    );

    public function checkExistEmail() {
        $reader = $this->whereEmail($this->email)
            ->first();
        return $reader !== null;
    }

    public static function updateProfileValidate($input, $record_id) {
        $rules = array(
            'email' => 'required|unique:readers,email,' . $record_id,
            'full_name' => 'required|min:3',
            'year_of_birth' => 'required|date',
        );

        $messages = array(
            'full_name.min' => 'xin nhập tối thiểu :min',
            'year_of_birth.date' => 'xin nhập ngày hợp lệ',
            'required' => 'không được để trống',
            'integer' => 'xin nhập vào số nguyên'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function studentValidate($input) {
        $rules = array(
            'full_name' => 'required',
            'class' => 'required',
            'email' => 'required',
            'avatar' => 'required',
        );

        $messages = array(
            'full_name.required' => 'Phải nhập tên bạn đọc',
            'class.required' => 'Phải nhập lớp',
            'email.required' => 'Phải nhập địa chỉ email',
            'avatar.required' => 'Phải chọn ảnh đại diện'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function teacherValidate($input) {
        $rules = array(
            'full_name' => 'required',
            'email' => 'required',
            'avatar' => 'required',
        );

        $messages = array(
            'full_name.required' => 'Phải nhập tên bạn đọc',
            'email.required' => 'Phải nhập địa chỉ email',
            'avatar.required' => 'Phải chọn ảnh đại diện'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function boot() {
        parent::boot();
        static::creating(function($reader) {
            $time = time();
            $vnCode = '893';
            $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 9);
            $fullCode = Book::ean13_check_digit($random);
            $reader->barcode = $fullCode;
            $reader->status = Reader::SS_CIRCULATED;
            $reader->created_by = Auth::user()->loginable_id;
        });
        // Write create reader event
        static::created(function($reader) {
            Activity::write(Session::get('User'), Activity::ADDED_CARD, $reader);
        });
    }

    public function saveCardNumber() {
        $cardPrefix = 'HV-';
        if ($this->isTeacher()) {
            $cardPrefix = 'GV-';
        } else if ($this->isStaff()) {
            $cardPrefix = 'NV-';
        }
        $card_number = $cardPrefix . sprintf("%04s", $this->id);
        $this->update(array('card_number' => $card_number));
    }

    public function creator() {
        return $this->belongsTo('User', 'created_by');
    }

    public function circulations() {
        return $this->hasMany('Circulation')->where('returned', '=', false);
    }

    public function representString() {
        return $this->full_name;
    }

    public function authorName() {
        return $this->full_name;
    }

    public function authorType() {
        return 'Bạn đọc';
    }

    public function getTypeName() {
        switch ($this->reader_type) {
            case self::TYPE_STUDENT:
                return 'Sinh viên';
            case self::TYPE_STAFF:
                return 'Cán bộ';
            case self::TYPE_TEACHER:
                return 'Giảng viên';
        }
    }

    public function isTeacher() {
        return $this->reader_type == self::TYPE_TEACHER;
    }

    public function isStaff() {
        return $this->reader_type == self::TYPE_STAFF;
    }

    public function isStudent() {
        return $this->reader_type == self::TYPE_STUDENT;
    }

    public static function readerBorrowing() {
        $readers = Reader::whereHas('circulations', function($query) {
                $query->where('is_lost', false);
            });
        return $readers->get();
    }

}
