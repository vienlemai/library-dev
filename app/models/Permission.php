<?php

class Permission {
    public static $SHARED_ROUTES = array(
        'home',
    );
    public static $ACTIONS = array(
        1 => array(
            'title' => 'Biên mục',
            'menus' => array(
                'book.catalog' => 'Danh sách',
                'book.create' => 'Thêm mới tài liệu'
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
                'reader.card',
                'reader.pause',
                'reader.unpause',
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
            ),
        ),
        5 => array(
            'title' => 'Cấu hình hệ thống',
            'menus' => array(
                'configs' => 'Cấu hình',
                'users' => 'Nhân viên',
            ),
            'routes' => array(
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
        $user = Auth::user();
        $permisions = array_merge(json_decode($user->permissions), json_decode($user->group->permissions));
        $availbleRoutes = array();
        foreach ($permisions as $p) {
            $availbleRoutes = array_merge($availbleRoutes, self::$ACTIONS[$p]['routes']);
        }
        $availbleRoutes = array_merge($availbleRoutes, self::$SHARED_ROUTES);
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
