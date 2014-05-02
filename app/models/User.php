<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel {
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
        self::MODERATOR =>array(
            
        ),
    );

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

    public function representString() {
        # "<self::$groups[$this->$group]> <Fullname>"
    }

}
