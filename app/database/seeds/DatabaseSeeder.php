<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//Eloquent::unguard();

		$this->call('BookTableSeeder');
	}

}

class StorageTableSeeder extends Seeder {

	public function run() {
		DB::table('storages')->truncate();
		$khoA = Storage::create(array('name' => 'Kho A'));
		$khoB = Storage::create(array('name' => 'Kho B'));
		$khoB->children()->create(array('name' => 'Luật'));
		$khoB->children()->create(array('name' => 'Tham Khảo'));
		$khoB->children()->create(array('name' => 'Nghiệp vụ cơ bản'));
		$child = $khoB->children()->create(array('name' => 'Chuyên ngành'));
		$child->children()->create(array('name'=>'Đường thủy'));
		$child->children()->create(array('name'=>'Đường bộ - Đường sắt'));
		$child->children()->create(array('name'=>'Cảnh sát môi trường'));
		$child->children()->create(array('name'=>'Cảnh sát kinh tế'));
		$child->children()->create(array('name'=>'Kỹ thuật hình sự'));
		$child->children()->create(array('name'=>'CA phụ trách xã'));
	}

}

class BookTableSeeder extends Seeder{
	public function run(){
		$book = new Book(array(
			'title'=>'Cánh đồng bất tận',
			'author'=>'Nguyễn Ngọc Tư',
			'number'=>20,
		));
		$book->save();
	}
}
