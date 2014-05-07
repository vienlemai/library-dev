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
        self::TYPE_STUDENT => 'Sinh viên',
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
        'avatar'
    );

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
            $reader->status = Reader::SS_CIRCULATED;
            $reader->created_by = Auth::user()->id;
            $expired = Session::get('LibConfig.reader_expired');
            $reader->expired_at = Carbon\Carbon::now()->addDays($expired);
        });
        // Write create reader event
        static::saved(function($reader) {
            Activity::write(Auth::user(), Activity::ADDED_CARD, $reader);
        });
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

    public function isTeacher() {
        return $this->reader_type == self::TYPE_TEACHER;
    }

    public function isStaff() {
        return $this->reader_type == self::TYPE_STAFF;
    }

    public function isStudent() {
        return $this->reader_type == self::TYPE_STUDENT;
    }

}
