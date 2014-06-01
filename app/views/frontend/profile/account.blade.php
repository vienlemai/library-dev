@extends('layouts.frontend')
@section('content')
<?php
$now = Carbon\Carbon::now();

?>
<div class="page-title">
    <i class="fa fa-user"></i> Thông tin tài khoản
</div>

<div class="clear margin-10"></div>
<div class='span4'>
    <?php echo Former::horizontal_open(route('fe.update_account'), 'POST') ?>
    <?php Former::populate($reader) ?>
    <?php echo Former::text('email', 'Email')->disabled() ?>
    <?php echo Former::text('full_name', 'Họ tên') ?>
    <?php echo Former::text('year_of_birth', 'Ngày sinh')->class('datepicker') ?>
    <?php echo Former::text('class', 'Lớp') ?>
    <?php echo Former::text('phone', 'Điện thoại') ?>
    <div class='control-group'>
        <div class='controls'>
            <button class="btn btn-default" type="submit">Lưu thay đổi</button>
        </div>
    </div>
    <?php echo Former::close() ?>
</div>
<div class='span4'>
    <?php echo Former::horizontal_open(route('fe.update_password'), 'POST') ?>
    <?php echo Former::password('password', 'Mật khẩu mới')->help('Tối thiếu 6 ký tự') ?>
    <?php echo Former::password('password_confirmation', 'Nhập lại') ?>
    <div class='control-group'>
        <div class='controls'>
            <button class="btn btn-default" type="submit">Cập nhật mật khẩu</button>
        </div>
    </div>
    <?php echo Former::close() ?>
</div>
<div class="clear"></div>
@stop