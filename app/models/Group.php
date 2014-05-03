<?php

class Group extends Eloquent {
    protected $table = 'groups';
    protected $fillable = array(
        'name',
        'permissions',
    );

    public static function boot() {
        parent::boot();
        static::creating(function($user) {
            $user->created_at = Carbon\Carbon::now();
            $user->updated_at = Carbon\Carbon::now();
        });
    }

    public static $ACTIONS = array(
        1 => array(
            'title' => 'Biên mục',
            'menus' => array(
                'book.catalog' => 'Danh sách',
                'book.create' => 'Thêm mới tài liệu'
            ),
            'routes' => array(
                'book.catalog',
                'book.create',
                'book.edit',
                'book.catalog.view',
                'book.barcode',
                'book.submit',
                'book.save',
                'book.update',
            ),
        ),
        2 => array(
            'title' => 'Kiểm duyệt',
            'menus' => array(
                'book.moderate' => 'Danh sách'
            ),
            'routes' => array(
                'book.moderate',
                'book.moderate.view',
                'book.disapprove',
                'book.publish',
                'book.barcode',
            ),
        ),
        3 => array(
            'title' => 'Lưu hành',
            'menus' => array(
                'circulation' => 'Mượn trả tài liệu',
                'book.library' => 'Danh sách tài liệu',
                'readers' => 'Danh sách bạn đọc',
            ),
            'routes' => array(
                'circulation',
                'book.library',
                'book.library.view',
                'book.barcode',
                'reader.create',
                'reader.view',
                'reader.card',
                'reader.pause',
                'reader.unpause',
            ),
        ),
        4 => array(
            'title' => 'Kiểm kê tài liệu',
            'menus' => array(
                'inventory.index' => 'Lịch sử kiểm kê',
                'inventory.create' => 'Tạo mới kiểm kê',
            ),
            'routes' => array(
                'inventory.index',
                'inventory.create',
                'inventory.execute',
                'inventory.result',
            ),
        ),
        5 => array(
            'title' => 'Cấu hình hệ thống',
            'menus' => array(
                'configs' => 'Cấu hình'
            ),
            'routes' => array(
                'configs'
            ),
        ),
    );

    public function users() {
        return $this->hasMany('User');
    }

}
