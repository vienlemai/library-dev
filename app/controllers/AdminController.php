<?php

class AdminController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        $activities = Activity::search()->paginate(50);
        foreach ($activities as $activity) {
            $author = $activity->author;
            $object = $activity->object;
            if ($author === null || $object === null) {
                DB::table('activities')->truncate();
                $activities = Activity::search()->paginate(Activity::PER_PAGE);
                break;
            }
        }
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
        $count['order'] = Order::where('status', Order::SS_NEW)
            ->count();
        $userPermissions = Auth::user()->loginable->getPermission();
        $isLibrarian = in_array(3, $userPermissions);
        $this->layout->content = View::make('admin.index')
            ->with('activities', $activities)
            ->with('count', $count)
            ->with('isLibrarian', $isLibrarian);
    }

    public function error($type) {
        $message = '';
        switch ($type) {
            case 'permission': $message = "Bạn không có quyền truy cập vào đây";
                break;
            case 'inventory':$message = 'Có một đợt kiểm kê đang diễn ra, bạn không thể thực hiện thao tác này cho đến khi kiểm kê kết thúc.';
                break;
            case 'internet':$message = 'Lỗi hệ thống, không có kết nối đến Internet,vui lòng kiểm tra lại kết nối';
                break;
            default : $message = 'Lỗi hệ thống';
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
            if (Auth::user()->loginable_type == 'User') {
                $previousUrl = URL::previous();
                if (strpos($previousUrl, 'admin') === false) {
                    return Redirect::route('home');
                } else {
                    return Redirect::intended('/admin');
                }
            } else {
                return Redirect::intended('/');
            }
        } else {
            Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return Redirect::back()->withInput();
        }
    }

    public function getLogout() {
        Auth::logout();
        Session::forget('User');
        return Redirect::route('login');
    }

    public function sendMail() {
        $readers = Reader::readerBorrowing();
        return View::make('admin.send_mail', array(
                'readers' => $readers
        ));
    }

    /* public function postSendMail() {
      $v = User::mailContentValidate(Input::all());
      if ($v->passes()) {
      $mailTitle = Input::get('title');
      $mailContent = Input::get('content');
      $readers = Reader::readerBorrowing();
      foreach ($readers as $reader) {
      DB::table('mail_queues')
      ->insert(array(
      'mail_to' => $reader->email,
      'subject' => $mailTitle,
      'content' => $mailContent,
      'created_at' => Carbon\Carbon::now(),
      'updated_at' => Carbon\Carbon::now(),
      ));
      }
      Session::flash('success', 'Đã gửi mail thành công cho ' . $readers->count() . ' bạn đọc');
      return Redirect::route('send.mail');
      } else {
      return Redirect::back()->withInput()->withErrors($v->messages());
      }
      } */

    public function postSendMail() {
        $v = User::mailContentValidate(Input::all());
        if ($v->passes()) {
            try {
                $mailTitle = Input::get('title');
                $mailContent = Input::get('content');
                //dd($mailContent);
                $readers = Reader::readerBorrowing();
                foreach ($readers as $reader) {
                    Mail::send('admin.mail_content', array('full_name' => $reader->full_name, 'mail_content' => $mailContent), function($message) use ($mailTitle, $reader) {
                        $message->to($reader->email, $reader->full_name)->subject($mailTitle);
                    });
                }
                Session::flash('success', 'Đã gửi mail thành công cho ' . $readers->count() . ' bạn đọc');
                return Redirect::route('send.mail');
            } catch (Exception $exc) {
                Session::flash('error', 'Gửi mail thất bại, khôn g có kết nối đến Internet nên không thể gửi mail, vui lòng kiểm tra lại kết nối');
                return Redirect::back();
            }
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function profile() {
        $user = Auth::user()->loginable;
        return View::make('admin.profile', compact('user'));
    }

    public function changePassword() {
        $user = Auth::user();
        $oldPass = Input::get('old_password');
        if (!Hash::check($oldPass, $user->password)) {
            Session::flash('error', 'Mật khẩu cũ không đúng');
        } else {
            $newPass = Input::get('password');
            $confirmPas = Input::get('password_confimation');
            if ($newPass != $confirmPas) {
                Session::flash('error', 'Mật khẩu mới phải giống nhau');
            } else {
                Session::flash('success','Đổi mật khẩu thành công');
                $user->password = Hash::make($newPass);
                $user->save();
            }
        }
        return Redirect::back();
    }

}
