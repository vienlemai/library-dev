<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    protected $table = 'users';

    const ADMIN = 'admin';
    const CATOLOGER = 'cataloger';
    const MODERATOR = 'moderator';
    const LIBRARIAN = 'librarian';

    public static $groups = array(
        self::ADMIN => 'Quản trị',
        self::CATOLOGER => 'Biên mục',
        self::MODERATOR => 'Kiểm duyệt',
        self::LIBRARIAN => 'Thủ thư'
    );
    public static $PERMISSIONS = array(
        self::CATOLOGER => array(
            'book/create',
            'book/catalog',
            'book/{id}/edit',
            'book.catalog.view',
            'book.barcode',
        ),
        self::MODERATOR => array(
        ),
    );
    protected $fillable = array(
        'username',
        'password',
        'full_name',
        'date_of_birth',
        'sex',
        'permissions',
        'group_id'
    );
    protected $hidden = array('password');

    public static function boot() {
        parent::boot();
        static::creating(function($user) {
            $user->created_at = Carbon\Carbon::now();
            $user->updated_at = Carbon\Carbon::now();
        });
    }

    public static function getDefaultPermission() {


        $sharedPermissions = array('home', 'error', 'logout');
        $catalogerPermissions = array('book.create', 'book.catalog', 'book.preview');
        $moderationPermissions = array();
        $librarianPermissions = array();
        return array(
            array(
                'name' => 'cataloger',
                'permissions' => array_merge($sharedPermissions, $catalogerPermissions)
            ),
            array(
                'name' => 'moderator',
                'permissions' => array_merge($sharedPermissions, $moderationPermissions)
            ),
            array(
                'name' => 'librarian',
                'permissions' => array_merge($sharedPermissions, $librarianPermissions)
            )
        );
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
