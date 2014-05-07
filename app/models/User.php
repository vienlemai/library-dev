<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface, IActivityAuthor {
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
                $user->permissions = json_encode(array());
                $user->created_at = Carbon\Carbon::now();
                $user->updated_at = Carbon\Carbon::now();
            });
        static::saving(function($user) {
                $permissions = json_decode($user->permissions);
                if (is_null($permissions)) {
                    $permissions = array();
                }
                $groupPermissions = json_decode($user->group->permissions);
                $allPermissions = array_merge($permissions, $groupPermissions);
                $routes = array();
                foreach ($allPermissions as $p) {
                    $routes = array_merge($routes, Permission::$ACTIONS[$p]['routes']);
                }
                $routes = array_merge($routes, Permission::$SHARED_ROUTES);
                $user->routes = json_encode($routes);
                $user->remember_token = '';
            });
        static::saved(function($user) {
                if (Auth::check()) {
                    Activity::write(Auth::user(), Activity::ADDED_STAFF, $user);
                }
            });
    }

    public function catalogers() {
        
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

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }

    public function getSexAttribute($value) {
        return $value == 0 ? 'Nam' : 'Nữ';
    }

    public function authorName() {
        return $this->full_name;
    }

    public function authorType() {
        return $this->group->name;
    }

    public function representString() {
        return $this->full_name;
    }

}
