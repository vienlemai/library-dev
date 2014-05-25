<?php

class Inventory extends Eloquent {
    /**
     * Table name
     */
    protected $table = 'inventories';

    /**
     * SS_DOING inventory is not finished
     */
    const SS_DOING = 0;

    /**
     * SS_FINISH inventory is finished
     */
    const SS_FINISHED = 1;

    /**
     * DB_PREFIX prefix for database table name
     */
    const DB_PREFIX = '_inventory_';

    public static $LABELS = array(
        self::SS_DOING => 'Đang diễn ra',
        self::SS_FINISHED => 'Đã kết thúc',
    );

    /**
     * Security fillable
     */
    protected $fillable = array(
        'title',
        'reason',
    );

    public function getDates() {
        return array_merge(parent::getDates(), array('end_at'));
    }

    public static function boot() {
        parent::boot();
        static::creating(function($inventory) {
            $inventory->status = Inventory::SS_DOING;
            $inventory->created_by = Auth::user()->loginable_id;
            $inventory->end_at = Carbon\Carbon::now();
        });
        static ::saved(function($inventory) {
            Schema::create(Inventory::DB_PREFIX . $inventory->id, function($t) {
                $t->increments('id');
                $t->string('barcode', 20);
                $t->integer('book_item_id');
                $t->integer('book_id');
                $t->integer('storage');
            });
        });
    }

    public function creator() {
        return $this->belongsTo('User', 'created_by');
    }

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
