<?php

class Permission {
    public static $SHARED_ROUTES = array(
        'home',
    );
    public static $ACTIONS = array(
        1 => array(
            'title' => 'Biên mục',
            'menus' => array(
                'book.catalog' => 'Tài liệu đang biên mục',
            ),
            'routes' => array(
                'book.catalog',
                'book.create',
                'book.edit',
                'book.catalog.view',
                'book.barcode',
                'book.submit',
                'book.save',
                'book.update',
                'book.import',
                'book.export.choose'
            ),
        ),
        2 => array(
            'title' => 'Kiểm duyệt',
            'menus' => array(
                'book.moderate' => 'Tài liệu gửi lên'
            ),
            'routes' => array(
                'book.moderate',
                'book.moderate.view',
                'book.disapprove',
                'book.publish',
                'book.barcode',
            ),
        ),
        3 => array(
            'title' => 'Lưu hành',
            'menus' => array(
                'circulation' => 'Mượn trả tài liệu',
                'order' => 'Bạn đọc đăng ký mượn',
                'book.library' => 'Danh sách tài liệu',
                'readers' => 'Danh sách bạn đọc',
            ),
            'routes' => array(
                'circulation',
                'book.library',
                'book.library.view',
                'book.barcode',
                'readers',
                'reader.create',
                'reader.view',
                'reader.edit',
                'reader.card',
                'reader.pause',
                'reader.unpause',
                'order'
            ),
        ),
        4 => array(
            'title' => 'Kiểm kê tài liệu',
            'menus' => array(
                'inventory.index' => 'Lịch sử kiểm kê',
                'inventory.create' => 'Tạo mới kiểm kê',
            ),
            'routes' => array(
                'inventory.index',
                'inventory.create',
                'inventory.execute',
                'inventory.result',
                'inventory.print',
            ),
        ),
        5 => array(
            'title' => 'Thống kê tài liệu',
            'menus' => array(
                'statistics.reader' => 'Thống kê bạn đọc',
                'statistics.book' => 'Thống kê tài liệu',
                'statistics.circulation' => 'Thống kê mượn trả',
                'statistics.user' => 'Thống kê nhân viên',
            ),
            'routes' => array(
                'statistics.reader',
                'statistics.book',
                'statistics.circulation',
                'statistics.user'
            ),
        ),
        6 => array(
            'title' => 'Quản trị hệ thống',
            'menus' => array(
                'configs' => 'Cấu hình',
                'users' => 'Nhân viên',
                'send.mail' => 'Gửi mail thu hồi tài liệu'
            ),
            'routes' => array(
                'send.mail',
                'configs',
                'users',
                'user.create',
                'user.view',
                'user.edit',
                'user.permission'
            ),
        ),
    );

    public function check($action) {
        $user = User::where('id', Auth::user()->loginable_id)
            ->first();
        Session::put('User', $user);
        $availbleRoutes = json_decode($user->routes);
        return in_array($action, $availbleRoutes);
    }

    public function resetSession($userId) {
        Session::forget('AVAILBEL_ROUTES');
        $user = User::with('group')->findOrFail($userId);
        $permisions = array_merge(json_decode($user->permissions), json_decode($user->group->permissions));
        $availbleRoutes = array();
        foreach ($permisions as $p) {
            $availbleRoutes = array_merge($availbleRoutes, self::$ACTIONS[$p]['routes']);
        }
        $availbleRoutes = array_merge($availbleRoutes, self::$SHARED_ROUTES);
        Session::set('AVAILBEL_ROUTES', $availbleRoutes);
    }

}
