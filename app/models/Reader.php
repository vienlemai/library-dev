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
	const SS_BORROWING = 0;

	/**
	 * Status SS_PAUSING reader is unable to borrow books
	 */
	const SS_PAUSING = 2;

	public static $LABELS = array(
		self::SS_CIRCULATING => 'Đang lưu thông',
		self::SS_BORROWING => 'Đang mượn tài liệu',
		self::SS_PAUSING => 'Đang bị khóa'
	);

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
		'phone'
	);

	public static function validate($input) {
		$rules = array(
			'full_name' => 'required',
			'class' => 'required',
			'email' => 'required',
		);

		$messages = array(
			'full_name.required' => 'Phải nhập tên bạn đọc',
			'class.required' => 'Phải nhập lớp',
			'email.required' => 'Phải nhập địa chỉ email'
		);
		return Validator::make($input, $rules, $messages);
	}

}
