<?php

class AdminController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        $activities = Activity::search()->paginate(Activity::PER_PAGE);
        $count['reader_student'] = Reader::where('reader_type', Reader::TYPE_STUDENT)->count();
        $count['reader_staff'] = Reader::where('reader_type', Reader::TYPE_STAFF)->count();
        $count['reader_teacher'] = Reader::where('reader_type', Reader::TYPE_TEACHER)->count();
        $count['reader_total'] = $count['reader_student'] + $count['reader_staff'] + $count['reader_teacher'];
        $count['book_book'] = BookItem::whereHas('book', function($q) {
                $q->where('book_type', Book::TYPE_BOOK);
            })->count();
        $count['book_magazine'] = BookItem::whereHas('book', function($q) {
                $q->where('book_type', Book::TYPE_MAGAZINE);
            })->count();
        $count['book_total'] = $count['book_book'] + $count['book_magazine'];
        $count['user'] = User::count();
        $this->layout->content = View::make('admin.index')
            ->with('activities', $activities)
            ->with('count', $count);
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
