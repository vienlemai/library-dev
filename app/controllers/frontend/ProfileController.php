<?php

class ProfileController extends FrontendBaseController {

    public function index() {
        $histories = array();
        $reader = $this->currentReader;
        $borrowing_books = Circulation::with('bookItem.book')
            ->where('reader_id', $this->currentReader->id)
            ->where('returned', false)
            ->get();
        return View::make('frontend.profile.index')
                ->with(compact('histories', 'reader', 'borrowing_books'));
    }

    public function update() {
        $reader = $this->currentReader;
        $inputs = Input::all();
        $validate = Reader::updateProfileValidate($inputs, $reader->id);
        if ($validate->passes()) {
            $reader->fill($inputs);
            $reader->save();
            Session::flash('success', 'Cập nhật thành công.');
            return Redirect::to(route('fe.profile'));
        } else {
            Session::flash('error', 'Cập nhật thất bại.');
            return Redirect::to(route('fe.profile'))->with('message', 'Cập nhật thất bại.')
                    ->withInput()
                    ->withErrors($validate->messages());
        }
    }

    public function updatePassword() {
        $validate = Validator::make(Input::all(), array(
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password'
                ), array(
                'required' => 'không được để trống',
                'min' => 'xin nhập tối thiểu :min ký tự',
                'password_confirmation.same' => 'xác nhận không khớp'
        ));

        if ($validate->passes()) {
            $account = $this->currentReader->account;
            $account->password = Hash::make(Input::get('password'));
            $account->save();
            Session::flash('success', 'Đổi mật khẩu thành công.');
            return Redirect::to(route('fe.profile'))->with('message', 'Đổi mật khẩu thành công.');
        } else {
            Session::flash('error', 'Đổi mật khẩu thất bại!');
            return Redirect::to(route('fe.profile'))
                    ->withErrors($validate->messages());
        }
    }

    public function extra($id) {
        $book_more_time = DB::table('configs')
            ->where('key', 'book_more_time')
            ->first();
        Circulation::where('id', '=', $id)
            ->increment('extensions');
        $circulation = Circulation::where('id', '=', $id)
            ->first();
        Circulation::where('id', '=', $id)
            ->update(array('expired_at' => $circulation->expired_at->addDays($book_more_time->value)));
        Session::flash('success', 'Gia hạn thành công');
        return Redirect::back();
    }

}
