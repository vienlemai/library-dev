@extends('layouts.admin')
@section('currentMenu','dashboard')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Trang chủ
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span7'>
                <div class="block">
                    <div class="head"><h2>Thông tin cá nhân</h2></div>
                    <div class="content">
                        <table class="table">
                            <tr>
                                <td>Họ tên</td>
                                <td>{{$user->full_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td>{{$user->username}}</td>
                            </tr>
                            <tr>
                                <td>Ngày sinh</td>
                                <td>{{$user->date_of_birth}}</td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td>{{$user->getSexName()}}</td>
                            </tr>
                            <tr>
                                <td>Phân quyền</td>
                                <td>{{$user->group->name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class='span5'>
                @include('partials.flash')
                <div class="block">
                    <div class="head">
                        <h2>Thay đổi mật khẩu</h2>
                    </div>
                    <div class="content">
                        <?php
                        echo Former::open(route('change_password'));
                        echo Former::password('old_password')->label('Mật khẩu cũ');
                        echo Former::password('password')->label('Mật khẩu mới');
                        echo Former::password('password_confimation')->label('Nhập lại mật khẩu');
                        echo Former::actions()->primary_submit('Lưu');

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop