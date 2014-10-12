<?php

class BookItem extends Eloquent {
    /**
     * Table name
     */
    protected $table = 'book_items';

    const SS_ADDED = 0;
    const SS_SUBMITED = 1;
    const SS_DISAPPROVED = 2;

    /**
     * Status still in storage
     */
    const SS_STORAGED = 3;

    /**
     * Status book is lended
     */
    const SS_LENDED = 4;

    /**
     * Status book is lost by reader
     */
    const SS_LOST_BY_READER = -1;

    /**
     * Status book is lost by inventory
     */
    const SS_LOST_BY_INVENTORY = -2;

    public $timestamps = false;

    /**
     * Security fillable
     */
    protected $fillable = array(
        'barcode',
        'status',
        'sequence',
        'book_id',
        'dkcb'
    );

    public function book() {
        return $this->belongsTo('Book');
    }

    public function getDKCB() {
        $book = $this->book;
        $storage = Storage::supperRoot($book->id);
        return $storage . $book->id . $this->sequence;
    }

    public function statusLabel() {
        switch ($this->status) {
            case self::SS_ADDED :
                return 'Đang biên mục';
            case self::SS_DISAPPROVED:
                return 'Bị từ chối lưu hành';
            case self::SS_STORAGED:
                return 'Đang lưu hành';
            case self::SS_LENDED:
                return 'Đang cho mượn';
            case self::SS_SUBMITED:
                return 'Đang chờ kiểm duyệt';
            case self::SS_LOST_BY_READER:
                return 'Bạn đọc làm mất';
            case self::SS_LOST_BY_INVENTORY:
                return 'Mất kiểm kê';
        }
    }

//    public function circulations (){
//        return $this->hasMany('Circulation');
//    }
}
