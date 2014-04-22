<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInventories extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('inventories', function($t) {
            $t->increments('id');
            $t->string('title', 255);
            $t->timestamp('created_at');
            $t->timestamp('end_at');
            $t->boolean('status')->default(false);
            $t->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('inventories', function($t) {
            $t->dropIfExists('inventories');
        });
    }

}
