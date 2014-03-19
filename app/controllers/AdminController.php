<?php

class AdminController extends BaseController {
	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.admin';

	public function index() {
		$this->layout->content = View::make('admin.index');
	}
	
	public function error($type){
		$message = '';
		switch ($type){
			case 'permission': $message = "Bạn không có quyền truy cập vào đây";
			//default : $message = 'Lỗi hệ thống';
		}
		return View::make('admin.error', compact('message'));
	}

	public function login() {
		$login_attribute = Config::get('cartalyst/sentry::users.login_attribute');
		return View::make('admin.login', compact('login_attribute'));
	}

	/**
	 * Authenticate the user
	 *
	 * @author Steve Montambeault
	 * @link   http://stevemo.ca
	 *
	 *
	 * @return Response
	 */
	public function postLogin() {
		try {
			$login_attribute = Config::get('cartalyst/sentry::users.login_attribute');
			$remember = Input::get('remember_me', false);
			$userdata = array(
				Config::get('cartalyst/sentry::users.login_attribute') => Input::get($login_attribute),
				'password' => Input::get('password')
			);

			$user = Sentry::authenticate($userdata, $remember);
			Event::fire('users.login', array($user));
			return Redirect::to('/');
		} catch (LoginRequiredException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		} catch (PasswordRequiredException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		} catch (WrongPasswordException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		} catch (UserNotActivatedException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		} catch (UserNotFoundException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		} catch (UserSuspendedException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		} catch (UserBannedException $e) {
			return Redirect::back()->withInput()->with('login_error', $e->getMessage());
		}
	}

	public function getLogout() {
		if (Sentry::check()) {
			$user = Sentry::getUser();
			Sentry::logout();
			Event::fire('users.logout', array($user));
			return Redirect::to('login');
		}
		return Redirect::route('login');
	}

}
