<?php

class Reader extends Eloquent {
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
	const SS_CIRCULATING = 0;

	/**
	 * Status SS_BORROWING reader borrowing books
	 */
	//const SS_BORROWING = 1;

	/**
	 * Status SS_PAUSING reader is unable to borrow books
	 */
	const SS_PAUSING = 1;

	public static $LABELS = array(
		self::SS_CIRCULATING => 'Đang lưu thông',
		//self::SS_BORROWING => 'Đang mượn tài liệu',
		self::SS_PAUSING => 'Đang bị khóa'
	);
	public function getDates() {
		return array_merge(parent::getDates(), array('expired_at'));
	}
	public function bookItems() {
		return $this->hasMany('BookItem');
	}

	/**
	 * Security fillable
	 */
	protected $fillable = array(
		'barcode',
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

	public static function validate($input) {
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

	public static function boot() {
		parent::boot();
		static::creating(function($reader) {
			$reader->status = Reader::SS_CIRCULATING;
			$reader->created_by = Sentry::getUser()->id;
			$expired = Session::get('LibConfig.reader_expired');
			$reader->expired_at = Carbon\Carbon::now()->addDays($expired);
		});
	}

}
