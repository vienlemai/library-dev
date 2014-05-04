<?php

class Circulation extends Eloquent {
    /**
     * Table name
     */
    protected $table = 'circulations';
    public $timestamps = false;

    /**
     * Security fillable
     */
    protected $fillable = array(
        'reader_id',
        'book_item_id'
    );

    public static function boot() {
        parent::boot();
        static::creating(function($circulation) {
                $circulation->created_at = Carbon\Carbon::now();
                $circulation->created_by = Auth::user()->id;
                $expired = Session::get('LibConfig.book_expired');
                $circulation->expired_at = Carbon\Carbon::now()->addDays($expired);
            });
        static::created(function($circulation) {
                Activity::write($circulation->reader, Activity::BORROWED_BOOK, $circulation->bookItem->book);
            });
    }

    public function getDates() {
        return array('created_at', 'expired_at');
    }

    public function bookItem() {
        return $this->belongsTo('bookItem');
    }

    public function reader() {
        return $this->belongsTo('Reader');
    }

}
