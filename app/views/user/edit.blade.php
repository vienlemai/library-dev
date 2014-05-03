@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Quản lý nhân viên
        </div>
    </div>
    <div class='content'>
        <div class='space'></div>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Chỉnh sửa nhân viên</h2>
                </div>
                <div class='content'>
                    @include('partials.flash')
                    {{ Former::horizontal_open(route('user.update',$user->id))->method('POST') }}
                    {{Former::xlarge_text('full_name')
								->label('Họ tên (*)')
                                ->value($user->full_name)   
                    }}
                    {{Former::xlarge_text('email')
								->label('Địa chỉ email (*)')
								->autocomplete('off')
                                ->value($user->email)
                    }}
                    {{Former::xlarge_text('username')
								->label('Tên đăng nhập (*)')
								->autocomplete('off')
                                ->value($user->username)
                    }}
                    {{Former::xlarge_password('password')
								->label('Mật khẩu (*)')
								->autocomplete('off')
                    }}
                    {{Former::xlarge_password('password_confirmation')
								->label('Nhập lại mật khẩu (*)')
								->autocomplete('off')
                    }}
                    {{Former::select('group_id')
								->label('Phân quyền (*)')
								->options($groups,$user->group_id)	
                    }}	
                    {{Former::inline_radios('sex')
								->label('Giới tính')
								->radios(array(
								  'Nam' => array('name' => 'sex', 'value' => 0),
								  'Nu' => array('name' => 'sex', 'value' => 1),
								))->check($user->sex)
                    }}
                    {{Former::token()}}

                    <div class='content-row'>
                        <button class='btn btn-primary offset3'>Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop