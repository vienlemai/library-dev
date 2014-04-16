<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCirculations extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('circulations', function($t) {
            $t->increments('id');
            $t->integer('reader_id');
            $t->integer('book_item_id');
            $t->integer('created_by');
            $t->integer('extensions')->default(0);
            $t->timestamp('created_at');
            $t->timestamp('expired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('circulations');
    }

}
