<?php

class PasswordController extends BaseController {
    
    public function reminderPassword() {
        // TODO: custom email template
        $credentials = array('username' => Input::get('username', null));
        Password::remind($credentials);
        // This flash message is not correct
//        if (Session::has('reason')) {
//            Session::flash('error', 'Không tìm thấy địa chỉ email đã nhập.');
//        } else {
        
        Session::flash('success', 'Hệ thống đã gửi hướng dẫn phục hồi mật khẩu đến email của bạn.');
//        }
        return Redirect::to(Input::get('return_url', route('fe.home')));
    }

}

