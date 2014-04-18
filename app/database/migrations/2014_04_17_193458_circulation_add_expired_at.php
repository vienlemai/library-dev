<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CirculationAddExpiredAt extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('circulations', function($t) {
            $t->dropColumn('expired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('circulations', function($t) {
            $t->dropColumn('expired_at');
        });
    }

}
