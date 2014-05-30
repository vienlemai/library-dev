<?php

class Order extends Illuminate\Database\Eloquent\Model {
    /**
     * Table name
     */
    protected $table = 'orders';

    const SS_NEW = 'new';
    const SS_APPROVED = 'approved';
    const SS_REJECTED = 'rejected';

    public $fillable = array(
        'reader_id',
        'book_id',
        'count',
        'scope'
    );
    public $timestamps = false;

    public function reader() {
        return $this->belongsTo('Reader');
    }

    public function book() {
        return $this->belongsTo('Book');
    }

    public function approver() {
        return $this->belongsTo('User', 'approved_by');
    }

    public function rejecter() {
        return $this->belongsTo('User', 'rejected_by');
    }

    public static function boot() {
        parent::boot();
        static::creating(function($order) {
            $order->status = Order::SS_NEW;
            $order->created_at = Carbon\Carbon::now();
        });
    }

    public function approve($timePickUp) {
        $this->status = self::SS_APPROVED;
        $this->approved_by = Auth::user()->loginable_id;
        $this->approved_at = Carbon\Carbon::now();
        $this->pick_up_at = $timePickUp;
        $this->save();
    }

    public function reject($reason) {
        $this->status = self::SS_REJECTED;
        $this->rejected_by = Auth::user()->loginable_id;
        $this->rejected_at = Carbon\Carbon::now();
        $this->reason_reject = $reason;
        $this->save();
    }

    public function getDates() {
        return array('approved_at', 'rejected_at', 'pick_up_at', 'created_at');
    }

    public function getStatusTitle() {
        switch ($this->status) {
            case self:: SS_NEW :
                return 'Đang chờ phản hồi';
            case self::SS_APPROVED:
                return 'Đã đồng ý';
            case self::SS_REJECTED:
                return 'Bị từ chối';
        }
    }

}
