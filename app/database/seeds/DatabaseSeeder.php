<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('table seeded!');
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
                'name' => 'Thời hạn thẻ',
                'key' => 'reader_expired',
                'value' => '365',
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Hạn trả tài liệu',
                'key' => 'book_expired',
                'value' => '30',
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Số tài liệu mượn tối đa mượn tại chỗ',
                'key' => 'max_book_local',
                'value' => '5',
                'unit' => 'Cuốn'
            ),
            array(
                'name' => 'Số tài liệu mượn tối đa mượn về nhà',
                'key' => 'max_book_remote',
                'value' => '5',
                'unit' => 'Cuốn'
            ),
            array(
                'name' => 'Số lần gia hạn tối đa',
                'key' => 'extra_times',
                'value' => '2',
                'unit' => 'Lần'
            ),
            array(
                'name' => 'Thời gian gia hạn thêm tài liệu',
                'key' => 'book_more_time',
                'value' => '10',
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Thời gian gia hạn thêm thẻ',
                'key' => 'reader_more_time',
                'value' => '365',
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Tiền phạt trễ hạn tài liệu',
                'key' => 'book_expired_fine',
                'value' => '1000',
                'unit' => 'Đồng/ngày/cuốn'
            ),
        ));
        Session::forget('LibConfig');
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

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->truncate();
        DB::table('groups')->truncate();
        $group = new Group(array(
            'name' => 'Quản trị',
            'permissions' => json_encode(array(1, 2, 3, 4, 5)),
        ));
        $group->save();
        $user = new User(array(
            'username' => 'admin',
            'full_name' => 'Quản trị viên',
            'password' => Hash::make('123456'),
            'sex' => 1,
            'date_of_birth' => '',
            'group_id' => $group->id,
            'permissions' => json_encode(array())
        ));
        $user->save();
        $group = new Group(array(
            'name' => 'Biên mục',
            'permissions' => json_encode(array(1)),
        ));
        $group->save();
        $user = new User(array(
            'username' => 'bienmuc',
            'password' => Hash::make('123456'),
            'full_name' => 'Biên mục viên',
            'sex' => 1,
            'date_of_birth' => '',
            'group_id' => $group->id,
            'permissions' => json_encode(array())
        ));
        $user->save();
        $group = new Group(array(
            'name' => 'Kiểm duyệt',
            'permissions' => json_encode(array(2)),
        ));
        $group->save();
        $user = new User(array(
            'username' => 'kiemduyet',
            'password' => Hash::make('123456'),            
            'full_name' => 'Kiểm duyệt viên',
            'sex' => 1,
            'date_of_birth' => '',
            'group_id' => $group->id,
            'permissions' => json_encode(array())
        ));
        $user->save();
        $group = new Group(array(
            'name' => 'Thủ thư',
            'permissions' => json_encode(array(3)),
        ));
        $group->save();
        $user = new User(array(
            'username' => 'thuthu',
            'password' => Hash::make('123456'),
            'full_name' => 'Thủ thư',
            'sex' => 1,
            'date_of_birth' => '',
            'group_id' => $group->id,
            'permissions' => json_encode(array())
        ));
        $user->save();
    }

}
