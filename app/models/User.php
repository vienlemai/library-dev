<?php

class User extends Illuminate\Database\Eloquent\Model implements IActivityAuthor {
    const TYPE_ADMIN = 1;
    const TYPE_CATALOGER = 2;
    const TYPE_MODERATOR = 3;
    const TYPE_LIBRARIAN = 4;

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

    public function account() {
        return $this->morphOne('User', 'loginable');
    }

    public static $TYPE_LABELS = array(
        self::TYPE_ADMIN => 'Quản trị',
        self::TYPE_CATALOGER => 'Biên mục',
        self::TYPE_MODERATOR => 'Kiểm duyêt',
        self::TYPE_LIBRARIAN => 'Thủ thư',
    );

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

    public function beforeCreat() {
        $this->permissions = json_encode(array());
    }

    public function afterCreate() {
        if (Auth::check()) {
            Activity::write(Session::get('User'), Activity::ADDED_STAFF, $this);
        }
    }

    public function beforeSave() {
        //exit ('beroresave');
        $permissions = json_decode($this->permissions);
        if (is_null($permissions)) {
            $permissions = array();
        }
        $groupPermissions = json_decode($this->group->permissions);
        $allPermissions = array_merge($permissions, $groupPermissions);
        $routes = array();
        foreach ($allPermissions as $p) {
            $routes = array_merge($routes, Permission::$ACTIONS[$p]['routes']);
        }
        $routes = array_merge($routes, Permission::$SHARED_ROUTES);
        $this->routes = json_encode($routes);
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
        return $this->remember_token;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getSexName() {
        return $this->sex == 0 ? 'Nam' : 'Nữ';
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

    public static function mailContentValidate($input) {
        $rules = array(
            'title' => 'required',
            'content' => 'required'
        );
        $message = array(
            'title.required' => 'Không được để trống tiêu đề email',
            'content.required' => 'Không được để trống nội dung email',
        );

        return Validator::make($input, $rules, $message);
    }

    public function isAdmin() {
        return $this->group_id == 1;
    }

    public function getPermission() {
        $userPer = json_decode($this->permissions);
        $groupPer = json_decode($this->group->permissions);
        return array_merge($userPer, $groupPer);
    }

}
