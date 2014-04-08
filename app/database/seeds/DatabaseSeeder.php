<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//Eloquent::unguard();

		$this->call('ConfigTableSeeder');
		$this->command->info('configs table seeded!');
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
		$child->children()->create(array('name' => 'Đường thủy'));
		$child->children()->create(array('name' => 'Đường bộ - Đường sắt'));
		$child->children()->create(array('name' => 'Cảnh sát môi trường'));
		$child->children()->create(array('name' => 'Cảnh sát kinh tế'));
		$child->children()->create(array('name' => 'Kỹ thuật hình sự'));
		$child->children()->create(array('name' => 'CA phụ trách xã'));
	}

}

class ConfigTableSeeder extends Seeder {

	public function run() {
		DB::table('configs')->truncate();
		DB::table('configs')->insert(array(
			array(
				'name'=>'Thời hạn thẻ',
				'key'=>'reader_expired',
				'value'=>'365',
				'unit'=>'Ngày'
			),
			array(
				'name'=>'Hạn trả tài liệu',
				'key'=>'book_expired',
				'value'=>'30',
				'unit'=>'Ngày'
			),
			array(
				'name'=>'Số tài liệu mượn tối đa',
				'key'=>'max_books',
				'value'=>'5',
				'unit'=>'Cuốn'
			),
			array(
				'name'=>'Số lần gia hạn tối đa',
				'key'=>'extra_times',
				'value'=>'2',
				'unit'=>'Lần'
			)
		));
	}

}

class BookTableSeeder extends Seeder {

	public function run() {
		$book = new Book(array(
			'title' => 'Cánh đồng bất tận',
			'author' => 'Nguyễn Ngọc Tư',
			'number' => 20,
		));
		$book->save();
	}

}
