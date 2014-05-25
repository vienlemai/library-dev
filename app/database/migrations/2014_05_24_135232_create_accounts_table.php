<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('accounts', function($t) {
            $t->increments('id');
            $t->string('username', 255);
            $t->string('password', 60);
            $t->integer('loginable_id');
            $t->string('loginable_type', 20);
            $t->string('remember_token', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('accounts');
    }

}
