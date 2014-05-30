<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('orders', function($t) {
                    $t->dropColumn('reason_reject');
                    $t->dropColumn('pick_up_at');
                    $t->dropColumn('approved_by');
                    $t->dropColumn('approved_at');

                    $t->dropColumn('rejected_by');
                    $t->dropColumn('rejected_at');
                });
        Schema::table('orders', function($t) {
                    $t->timestamp('pick_up_at')->nullable();
                    $t->integer('approved_by')->nullable();
                    $t->datetime('approved_at')->nullable();

                    $t->integer('rejected_by')->nullable();
                    $t->datetime('rejected_at')->nullable();
                    $t->text('reason_reject')->nullable();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
    }

}
