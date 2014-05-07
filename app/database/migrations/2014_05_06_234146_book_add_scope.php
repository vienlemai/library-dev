<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookAddScope extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('books', function($t) {
            $t->integer('scope');
            $t->integer('permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('books', function($t) {
            $t->dropColumn('scope');
            $t->dropColumn('permission');
        });
    }

}
