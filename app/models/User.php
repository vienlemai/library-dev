<?php

class User {
	public static $groups = array(
		'admin' => 'Quản trị',
		'cataloger' => 'Biên mục',
		'moderator' => 'Kiểm duyêt',
		'librarian' => 'Thủ thư'
	);
	public static $get_actions = array(
		array(
			'path' => 'book/create',
			'displayName' => 'Thêm mới tài liệu',
			'name' => 'book.create',
			'controller' => 'BookController',
			'action' => 'create'
		),
		array(
			'path' => 'book/catalog',
			'displayName' => 'Biên mục tài liệu',
			'name' => 'book.catalog',
			'controller' => 'BookController',
			'action' => 'catalog',
		),
		array(
			'path' => 'book/{id}preview',
			'displayName' => 'Xem trước tài liệu',
			'name' => 'book.preview',
			'controller' => 'BookController',
			'action' => 'preview'
		),
	);

	public static function getDefaultPermission() {
		$sharedPermissions = array('home', 'error', 'logout');
		$catalogerPermissions = array('book.create', 'book.catalog', 'book.preview');
		$moderationPermissions = array();
		$librarianPermissions = array();
		return array(
			array(
				'name' => 'cataloger',
				'permissions' => array_merge($sharedPermissions, $catalogerPermissions)
			),
			array(
				'name' => 'moderator',
				'permissions' => array_merge($sharedPermissions, $moderationPermissions)
			),
			array(
				'name' => 'librarian',
				'permissions' => array_merge($sharedPermissions, $librarianPermissions)
			)
		);
	}

}
