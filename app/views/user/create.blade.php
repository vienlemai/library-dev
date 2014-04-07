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
					<h2>Thêm mới nhân viên</h2>
				</div>
				<div class='content'>
					{{ Former::horizontal_open(route('book.save'))->method('POST') }}
					{{Former::xlarge_text('full_name')
								->label('Họ tên (*)')
					}}
					{{Former::xlarge_text('email')
								->label('Địa chỉ email')
					}}
					{{Former::xlarge_text('username')
								->label('Tên đăng nhập')
					}}
					{{Former::xlarge_password('password')
								->label('Mật khẩu')
					}}
					{{Former::xlarge_password('confirm_password')
								->label('Nhập lại mật khẩu')
					}}
					{{Former::select('group_id')
								->label('Phân quyền')
								->options($groups)	
					}}
					{{Former::xxlarge_text('day_of_birth')
								->label('Ngày sinh')
								->class('datepicker')
					}}	
					{{Former::radio('sex')
								->label('Ngày sinh')
					}}	
					
					{{Former::xxlarge_text('')
								->label('Quê quán')
					}}									
					
					<div class='content-row'>
						<button class='btn btn-primary offset3'>Tạo mới</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop