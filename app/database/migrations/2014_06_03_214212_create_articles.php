<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('articles', function($t) {
            $t->increments('id');
            $t->string('title', 255);
            $t->text('content');
            $t->timestamps();
            $t->boolean('active')->default(true);
            $t->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExist('articles');
    }

}
