<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * File Account.php
 *
 * PHP version 5.3+
 *
 * @author    Evolpas
 * @copyright 2010-2014 evolpas
 * @license   http://www.evolpas.com/license license
 * @version   XXX
 * @link      http://www.evolpas.com
 * @category  Restaurant
 * @package   Restaurant
 */

/**
 * Class Account
 *
 * Class description
 *
 * @author    Evolpas
 * @copyright 2013-2014 evolpas
 * @license   http://www.evolpas.com/license license
 * @version   XXX
 * @link      http://www.evolpas.com
 * @category  Account
 * @package   Account
 * @since     XXX
 */
class Account extends Eloquent implements UserInterface, RemindableInterface {
    /**
     * Table name
     */
    protected $table = 'accounts';
    
    public $fillable = array(
        'username',
        'password',
        'loginable_id',
        'loginable_type',
        'remember_token'
    );
    public $timestamps = false;

    public function loginable() {
        return $this->morphTo();
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
        return $this->username;
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

}
