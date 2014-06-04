<?php

class Article extends Illuminate\Database\Eloquent\Model {

    public $fillable = array(
        'title',
        'content',
    );

    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
                    $model->user_id = Auth::user()->loginable_id;
                });
    }

    public function creator() {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function scopeRecent($query, $number) {
        return $query->take($number);
    }

    public function scopeTop($query, $number) {
        return $query->take($number);
    }

    public static function validate($input) {
        $rules = array(
            'title' => 'required',
            'content' => 'required',
        );
        $messages = array(
            'title.required' => 'Không được để trống tiêu đề thông báo',
            'content.required' => 'Không được để trống nội dung thông báo',
        );
        return Validator::make($input, $rules, $messages);
    }

    public function makeActive() {
        $this->active = true;
        $this->save();
    }

    public function makeInactive() {
        $this->active = false;
        $this->save();
    }

    public function isActive() {
        return $this->active == true;
    }

}
