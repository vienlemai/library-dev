<?php

class UserController extends BaseController {
	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.admin';

	public function create() {
		$gs = Sentry::getGroupProvider()->findAll();
		$groups = array();
		foreach ($gs as $group) {
			$groups[$group->id] = User::$groups[$group->name];
		}
		$this->layout->content = View::make('user.create', array('groups' => $groups));
	}
	
	public function save(){		
	}

	public function createGroup() {
		try {
			// Create the group
			$group = Sentry::createGroup(array(
						'name' => 'Admin',
						'permissions' => array(
							'admin' => 1,
							'users' => 1,
						),
			));
		} catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
			echo 'Name field is required';
		} catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			echo 'Group already exists';
		}
	}

}
