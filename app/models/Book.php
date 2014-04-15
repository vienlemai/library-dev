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

	/**
	 * Security fillable
	 */
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
	);

	public static function boot() {
		parent::boot();
		static::creating(function($book) {
			$book->status = Book::SS_ADDED;
			$book->created_by = Sentry::getUser()->id;
			$book->barcode_printed = 0;
		});
	}

	public static function validate($input) {
		$rules = array(
			'title' => 'required',
			'author' => 'required',
			'number' => 'required',
		);

		$messages = array(
			'title.required' => 'Phải nhập tên tài liệu',
			'author.required' => 'Phải nhập tác giả',
			'number.required' => 'Phải nhập số lượng'
		);
		return Validator::make($input, $rules, $messages);
	}

}
