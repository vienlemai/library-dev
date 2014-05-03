<?php

class AdminController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        $activities = Activity::with('author.group')->take(10)->get();
        $this->layout->content = View::make('admin.index')
            ->with('activities', $activities);
    }

    public function error($type) {
        $message = '';
        switch ($type) {
            case 'permission': $message = "Bạn không có quyền truy cập vào đây";
            //default : $message = 'Lỗi hệ thống';
        }
        return View::make('admin.error', compact('message'));
    }

    public function login() {
        return View::make('admin.login');
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
        $remember = false;
        if (Input::has('remember')) {
            $remember = true;
        }
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')), $remember)) {
            return Redirect::intended('/');
        } else {
            Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return Redirect::to('/login')->withInput();
        }
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::route('login');
    }

}
