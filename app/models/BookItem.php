<?php

class BookItem extends Eloquent {
    /**
     * Table name
     */
    protected $table = 'book_items';

    /**
     * Status still in storage
     */
    const SS_STORAGED = 0;

    /**
     * Status book is lended
     */
    const SS_LENDED = 1;

    public $timestamps = false;

    /**
     * Security fillable
     */
    protected $fillable = array(
        'barcode',
        'status'
    );

    public function book() {
        return $this->belongsTo('Book');
    }



//    public function circulations (){
//        return $this->hasMany('Circulation');
//    }
}
