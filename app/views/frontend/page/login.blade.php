@extends('layouts.frontend')
@section('content')
<div id="login-page-wrap">
    <div class="contact_form text-center">
        <form name="register" action="{{route('login')}}" method="POST">   
            <div class="form_row">
                <label class="contact"><strong>Email</strong></label>
                <input type="text" name="username" class="contact_input" />
            </div>
            <div class="form_row">
                <label class="contact"><strong>Mật khẩu</strong></label>
                <input type="password" name="password" class="contact_input" />
            </div> 
            <div class="form_row text-center">
                <a href="#modal-reminder-password" data-toggle="modal">Quên mật khẩu?</a>
                <button href="#" class="btn btn-small btn-brow">Đăng nhập</button>
            </div>
        </form>     
    </div>
</div>
<div class="modal hide fade" id="modal-reminder-password" style="width: 500px;left: 53%;">
    <?php echo Former::open(route('fe.reminder_password'))->method('POST')->class('form-horizontal') ?>
    <?php echo Former::hidden('return_url', route('fe.login')) ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Quên mật khẩu</h4>
    </div>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Địa chỉ email của bạn:</label>
            <div class="controls">
                <input type="email" name="username" id="inputEmail" required>
            </div>
        </div>
        <span class="help-inline text-italic">Bạn sẽ nhận được email hướng dẫn phục hồi mật khẩu</span>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn"><i class="fa fa-times"></i> Đóng</a>
        <button type="submit" class="btn btn-success"> Chấp nhận</button>
    </div>
    <?php echo Former::close() ?>
</div>

@stop