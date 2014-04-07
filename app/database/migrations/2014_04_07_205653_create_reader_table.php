<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('readers', function($t) {
			$t->increments('id');
			$t->string('barcode', 16);
			$t->string('full_name', 100);
			$t->string('class', 30);
			$t->string('year_of_birth', 30)->nullable();
			$t->string('hometown')->nullable();
			$t->string('school_year', 20)->nullable();
			$t->string('subject', 100)->nullable();
			$t->string('email', 100);
			$t->string('phone', 20)->nullable();
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('readers');
	}

}
