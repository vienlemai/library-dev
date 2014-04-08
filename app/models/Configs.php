<?php

class Configs extends Eloquent {
	/**
	 * Table name
	 */
	protected $table = 'configs';

	public $timestamps = false;
	/**
	 * Security fillable
	 */
	protected $fillable = array(
		'name',
		'key',
		'value',
		'unit'
	);

	public static function validate($input) {
		$rules = array(
			'value' => 'required',
		);

		$messages = array(
			'full_name.required' => 'Phải nhập giá trị',
		);
		return Validator::make($input, $rules, $messages);
	}

}
