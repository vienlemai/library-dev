<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('books', function($table) {
			$table->increments('id');
			$table->string('barcode', 16);
			$table->string('title', 255);
			$table->string('sub_title', 255)->nullable();
			$table->string('author', 100);
			$table->string('translator', 100)->nullable();
			$table->string('publish_info', 255)->nullable();
			$table->string('publisher', 150)->nullable();
			$table->string('printer', 150)->nullable();
			$table->integer('pages')->nullable();
			$table->string('size', 50)->nullable();
			$table->string('attach', 255)->nullable();
			$table->string('organization', 255)->nullable();
			$table->string('language', 100)->nullable();
			$table->string('cutter', 100)->nullable();
			$table->string('type_number', 100)->nullable();
			$table->string('price', 100)->nullable();
			$table->integer('storage');
			$table->integer('number');
			$table->integer('level');
			$table->text('another_infor')->nullable();
			$table->integer('status')->nullable();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->integer('created_by');
			$table->integer('barcode_printed')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//Schema::drop('books');
	}

}
