<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('users');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('users_groups');
        Schema::create('users', function($t) {
            $t->increments('id');
            $t->string('username', 255);
            $t->string('password', 60);
            $t->integer('group_id');
            $t->string('full_name', 255);
            $t->string('date_of_birth');
            $t->boolean('sex')->default(0);
            $t->string('permissions', 255);
            $t->timestamps();
        });

        Schema::create('groups', function($t) {
            $t->increments('id');
            $t->string('name', 100);
            $t->string('permissions', 255);
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('users_groups');
    }

}
