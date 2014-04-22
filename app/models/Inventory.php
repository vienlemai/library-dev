<?php

class Inventory extends Eloquent {
    /**
     * Table name
     */
    protected $table = 'inventories';
      /**
     * Security fillable
     */
    protected $fillable = array(
        'title',
        'reason',
    );

    public static function validate($input) {
        $rules = array(
            'title' => 'required',
            'reason' => 'required',
        );

        $messages = array(
            'title.required' => 'Phải nhập tiêu đề kiểm kê',
            'reason.required' => 'Phải nhập lý do kiểm kê',
        );
        return Validator::make($input, $rules, $messages);
    }

}
