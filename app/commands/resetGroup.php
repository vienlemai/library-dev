<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class resetGroup extends Command {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'reset-group';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Reset default groups';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire() {
		DB::table('groups')->truncate();
		try {
			Sentry::createGroup(array(
				'name' => 'admin',
				'permissions' => array(
					'superuser' => 1,
				),
			));
			foreach (User::getDefaultPermission() as $item) {
				$pers = array();
				foreach ($item['permissions'] as $k) {
					$pers[$k] = 1;
				}
				Sentry::createGroup(array(
					'name' => $item['name'],
					'permissions' => $pers
				));
			}
			$this->info('groups table is reset');
			if ($this->confirm('Do you want to reset users table [yes|no]')) {
				DB::table('users')->truncate();
				try {
					// Create the user
					$admin = Sentry::createUser(array(
								'email' => 'admin',
								'password' => '123456',
								'activated' => true,
								'permissions' => array('superuser' => 1),
					));
					$adminGroup = Sentry::findGroupByName('admin');
					$admin->addGroup($adminGroup);

					$cataloger = Sentry::createUser(array(
								'email' => 'cataloger',
								'password' => '123456',
								'activated' => true,
								'permissions' => array(),
					));
					$catalogGroup = Sentry::findGroupByName('cataloger');
					$cataloger->addGroup($catalogGroup);

					$moderator = Sentry::createUser(array(
								'email' => 'moderator',
								'password' => '123456',
								'activated' => true,
								'permissions' => array(),
					));
					$moderatorGroup = Sentry::findGroupByName('moderator');
					$moderator->addGroup($moderatorGroup);

					$librarian = Sentry::createUser(array(
								'email' => 'librarian',
								'password' => '123456',
								'activated' => true,
								'permissions' => array(),
					));
					$librarianGroup = Sentry::findGroupByName('librarian');
					$librarian->addGroup($librarianGroup);
				} catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
					echo 'Login field is required.';
				} catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
					echo 'Password field is required.';
				} catch (Cartalyst\Sentry\Users\UserExistsException $e) {
					echo 'User with this login already exists.';
				} catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
					echo 'Group was not found.';
				}
			}
		} catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
			echo 'Name field is required';
		} catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			echo 'Group already exists';
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions() {
		return array(
		);
	}

}
