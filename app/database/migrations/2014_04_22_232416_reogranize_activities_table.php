<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReogranizeActivitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::drop('activities');
        Schema::create('activities', function($table) {
                $table->increments('id');

                # Author of event
                $table->string('author_id');
                $table->string('author_class');

                # Type of activity 
                $table->string('activity_code');

                # The object that the author affected on/created/deleted?
                # Book, User, Reader, etc ...
                $table->string('object_id');
                $table->string('object_class');

                # Only author of activity
                $table->dateTime('created_at');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
