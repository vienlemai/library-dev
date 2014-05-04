<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructureActivities extends Migration {

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
                $table->integer('author_id');
                $table->string('author_type');

                # Type of activity 
                $table->string('code');
                $table->string('group');

                # The object that the author affected on/created/deleted?
                # Book, User, Reader, etc ...
                $table->integer('object_id');
                $table->string('object_type');
                
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
