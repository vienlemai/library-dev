<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CirculationAddExpiredAt2 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('circulations', function($t) {
            $t->boolean('expired')->default(false);
            $t->timestamp('expired_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('circulations', function() {
            $t->dropcolumn('expired', 'expired_at');
        });
    }

}
