<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCutterControls extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('book_type_controls', function($t) {
            $t->increments('id');
            $t->string('book_type_number', 100)->default('');
            $t->integer('book_id');
            $t->integer('max');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('book_type_controls');
    }

}
