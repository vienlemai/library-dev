<?php

class UserController extends BaseController {
	/* public function create() {
	  try {
	  // Create the user
	  $user = Sentry::createUser(array(
	  'email' => 'admin',
	  'password' => '123456',
	  'activated' => true,
	  ));

	  // Find the group using the group id
	  $this->createGroup();
	  $adminGroup = Sentry::findGroupById(1);

	  // Assign the group to the user
	  $user->addGroup($adminGroup);
	  } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
	  echo 'Login field is required.';
	  } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
	  echo 'Password field is required.';
	  } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
	  echo 'User with this login already exists.';
	  } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
	  echo 'Group was not found.';
	  }

	  exit('User created');
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
	  } */
}
