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

    

    public function users() {
        return $this->hasMany('User');
    }

}
