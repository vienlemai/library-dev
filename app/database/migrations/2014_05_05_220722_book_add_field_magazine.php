<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookAddFieldMagazine extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('books', function($t) {
            $t->string('magazine_number', 100)->nullable();
            $t->string('magazine_publish_day', 100)->nullable();
            $t->string('magazine_additional', 100)->nullable();
            $t->string('magazine_special', 100)->nullable();
            $t->string('magazine_local', 255)->nullable();
            $t->integer('book_type')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('books', function($t) {
            $t->dropColumn('magazine_number');
            $t->dropColumn('magazine_publish_day');
            $t->dropColumn('magazine_additional');
            $t->dropColumn('magazine_special');
            $t->dropColumn('magazine_local');
            $t->dropColumn('book_type');
        });
    }

}
