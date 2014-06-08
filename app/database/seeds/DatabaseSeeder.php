<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Eloquent::unguard();
        //$this->call('SystemConfigSeed');
        //$this->call('ConfigTableSeeder');
        //$this->call('StorageTableSeeder');
        $this->call('UserTableSeeder');
        $this->command->info('table seeded!');
    }

}

class SystemConfigSeed extends Seeder {

    public function run() {
        DB::table('system_configs')
            ->truncate();
        DB::table('system_configs')
            ->insert(array(
                'name' => 'last_execute',
                'day' => Carbon\Carbon::now()
        ));
    }

}

class StorageTableSeeder extends Seeder {

    public function run() {
        DB::table('storages')->truncate();
        $khoA = Storage::create(array('name' => 'Tài liệu tham khảo'));
        $khoB = Storage::create(array('name' => 'Tư liệu giáo khoa'));
        $khoB->children()->create(array('name' => 'Luật'));
        $khoB->children()->create(array('name' => 'Tham Khảo'));
        $khoB->children()->create(array('name' => 'Nghiệp vụ cơ bản'));
        $child = $khoB->children()->create(array('name' => 'Chuyên ngành'));
        $child->children()->create(array('name' => 'Đường thủy'));
        $child->children()->create(array('name' => 'Đường bộ - Đường sắt'));
        $child->children()->create(array('name' => 'Ma túy'));
        $child->children()->create(array('name' => 'Hình sự'));
        $child->children()->create(array('name' => 'Quản lý hành chính'));
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
                'is_hide' => false,
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Hạn trả tài liệu',
                'key' => 'book_expired',
                'value' => '30',
                'is_hide' => false,
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Số tài liệu mượn tối đa mượn tại chỗ',
                'key' => 'max_book_local',
                'value' => '5',
                'is_hide' => false,
                'unit' => 'Cuốn'
            ),
            array(
                'name' => 'Số tài liệu mượn tối đa mượn về nhà',
                'key' => 'max_book_remote',
                'value' => '5',
                'is_hide' => false,
                'unit' => 'Cuốn'
            ),
            array(
                'name' => 'Số lần gia hạn tối đa',
                'key' => 'extra_times',
                'value' => '2',
                'is_hide' => false,
                'unit' => 'Lần'
            ),
            array(
                'name' => 'Thời gian gia hạn thêm tài liệu',
                'key' => 'book_more_time',
                'value' => '10',
                'is_hide' => false,
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Thời gian gia hạn thêm thẻ',
                'key' => 'reader_more_time',
                'value' => '365',
                'is_hide' => false,
                'unit' => 'Ngày'
            ),
            array(
                'name' => 'Tiền phạt trễ hạn tài liệu',
                'key' => 'book_expired_fine',
                'value' => '1000',
                'unit' => 'Đồng/ngày/cuốn',
                'is_hide' => false,
            ),
            array(
                'name' => 'Lần cuối quét hệ thống',
                'key' => 'last_execute',
                'value' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'unit' => '',
                'is_hide' => true,
            ),
        ));
    }

}

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->truncate();
        DB::table('groups')->truncate();
        DB::table('accounts')->truncate();
        $group = new Group(array(
            'name' => 'Quản trị',
            'permissions' => json_encode(array(1, 2, 3, 4, 5, 6)),
        ));
        $group->save();
        $user = new User(array(
            'username' => 'admin',
            'email' => 'admin@email.com',
            'full_name' => 'Quản trị viên',
            'password' => Hash::make('123456'),
            'sex' => 1,
            'date_of_birth' => '',
            'group_id' => $group->id,
            'remember_token' => '',
            'permissions' => json_encode(array())
        ));
        $account = new Account(array(
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'remember_token' => ''
        ));
        $user->beforeCreat();
        $user->beforeSave();
        $user->save();
        $user->account()->save($account);
        $group = new Group(array(
            'name' => 'Biên mục',
            'permissions' => json_encode(array(1)),
        ));
        $group->save();
        $group = new Group(array(
            'name' => 'Kiểm duyệt',
            'permissions' => json_encode(array(2)),
        ));
        $group->save();
        $group = new Group(array(
            'name' => 'Thủ thư',
            'permissions' => json_encode(array(3)),
        ));
        $group->save();
    }

}
