@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Quản lý nhân viên
        </div>
        <div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small' href='{{route('users')}}'>
						<i class='i-reply'></i>
						Quay lại danh sách
					</a>
				</li>
			</ul>
		</div>
    </div>
    <div class='content'>
        <div class='space'></div>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thôn tin nhân viên</h2>
                </div>
                <div class='content'>
                    @include('partials.flash')
                    {{ Former::horizontal_open(route('user.update',$user->id))->method('POST') }}
                    {{Former::xlarge_text('full_name')
								->label('Họ tên (*)')
                                ->value($user->full_name)
                                ->disabled()
                    }}
                    {{Former::xlarge_text('email')
								->label('Địa chỉ email (*)')
								->autocomplete('off')
                                ->value($user->email)
                                ->disabled()
                    }}
                    {{Former::xlarge_text('username')
								->label('Tên đăng nhập (*)')
								->autocomplete('off')
                                ->value($user->username)
                                ->disabled()
                    }}                    
                    {{Former::xlarge_text('group_id')
								->label('Phân quyền (*)')
                                ->value($user->group->name)
                                ->disabled()
                    }}	
                    {{Former::xlarge_text('date_of_birth')
								->label('Ngày sinh')
                                ->value($user->date_of_birth)
                                ->disabled()
                    }}	
                    {{Former::xlarge_text('sex')
								->label('Giới tính')
                                ->value($user->sex)
                                ->disabled()
                    }}	
                </div>
            </div>
        </div>
    </div>

</div>
@stop