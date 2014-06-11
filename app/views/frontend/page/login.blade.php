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
                <a href="#">Quên mật khẩu?</a>
                <button href="#" class="btn btn-small btn-brow">Đăng nhập</button>
            </div>
        </form>     
    </div>
</div>
@stop