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
        'book_item_id',
        'expired_at',
        'scope'
    );

    public static function boot() {
        parent::boot();
        static::creating(function($circulation) {
            $circulation->created_at = Carbon\Carbon::now();
            $circulation->created_by = Auth::user()->loginable_id;
        });
        static::created(function($circulation) {
            Activity::write($circulation->reader, Activity::BORROWED_BOOK, $circulation->bookItem->book);
        });
    }

    public static function createCirculation($readerId, $bookItemId, $scope) {
        $expired = Session::get('LibConfig.book_expired');

        $circulation = new Circulation(array(
            'reader_id' => $readerId,
            'book_item_id' => $bookItemId,
            'scope' => $scope,
        ));
        if ($scope == Book::SCOPE_AWAY) {
            $circulation->expired_at = Carbon\Carbon::now()->addDays($expired);
        } else {
            $circulation->expired_at = Carbon\Carbon::now();
        }

        $circulation->save();
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
