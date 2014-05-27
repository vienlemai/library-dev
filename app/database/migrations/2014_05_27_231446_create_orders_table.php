<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function($t) {
                $t->increments('id');
                $t->integer('reader_id');
                $t->integer('book_id');
                $t->integer('count');
                $t->string('status'); // Pending // Approved // Rejected

                $t->integer('approved_by');
                $t->datetime('approved_at');

                $t->integer('rejected_by');
                $t->datetime('rejected_at');

                $t->timestamp('created_at');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropTable('orders');
    }

}
