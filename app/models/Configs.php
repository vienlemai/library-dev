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
            'reader_expired' => 'required',
            'book_expired' => 'required',
            'max_book_local' => 'required',
            'max_book_remote' => 'required',
            'extra_times' => 'required',
        );

        $messages = array(
            'reader_expired.required' => 'Phải nhập giá trị',
            'book_expired.required' => 'Phải nhập giá trị',
            'max_book_local.required' => 'Phải nhập giá trị',
            'max_book_remote.required' => 'Phải nhập giá trị',
            'extra_times.required' => 'Phải nhập giá trị',
        );
        return Validator::make($input, $rules, $messages);
    }

}
