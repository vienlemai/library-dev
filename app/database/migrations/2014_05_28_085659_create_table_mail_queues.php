<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMailQueues extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('mail_queues', function($t) {
            $t->increments('id');
            $t->string('mail_to', 100);
            $t->string('mail_from');
            $t->string('subject', 255);
            $t->text('content');
            $t->boolean('status')->default(0);
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExist('mail_queues');
    }

}
