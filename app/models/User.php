<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    protected $table = 'users';
    protected $fillable = array(
        'username',
        'password',
        'full_name',
        'date_of_birth',
        'sex',
        'permissions',
        'group_id',
        'remember_token',
        'email'
    );
    protected $hidden = array('password');

    public static function validate($input) {
        $rules = array(
            'username' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'full_name' => 'required',
        );

        $messages = array(
            'min' => 'xin nhập tối thiểu :min',
            'required' => 'không được để trống',
            'email' => 'Email không đúng',
            'password_confirmation.same' => 'Mật khẩu phải giống nhau'
        );
        return Validator::make($input, $rules, $messages);
    }

    public static function boot() {
        parent::boot();
        static::creating(function($user) {
            $user->created_at = Carbon\Carbon::now();
            $user->updated_at = Carbon\Carbon::now();
        });
    }

    public function catalogers() {
        
    }

    public function groupName() {
        $group_name = $this->group()->name;
        return self::$groups[$group_name];
    }

    public function group() {
        return $this->belongsTo('Group');
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

}
