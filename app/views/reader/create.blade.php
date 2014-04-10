@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Thêm mới bạn đọc
		</div>
		<div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small' href='{{route('readers')}}'>
						<i class='i-reply'></i>
						Danh sách bạn đọc
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='block'>
				<div class='head'>
					<h2>Nhập thông bạn đọc</h2>
				</div>
				<div class='content'>
					{{ Former::horizontal_open(route('reader.save'))->method('POST') }}
					{{Former::xlarge_text('full_name')
								->label('Họ tên (*)')
					}}

					<div class="control-group">
						<label class="control-label" for="avatar">Ảnh đại diện (*)</label>
						<div class="controls">
							<input type="file" class="input-choose-image" data-url="{{route('upload.image')}}" data-token="{{Session::token()}}"/>
							<div>
								<img class="" src="{{asset('img/no_avatar.gif')}}" width="100" height="100"/>
							</div>
						</div>
					</div>

					{{Former::xlarge_text('year_of_birth')
								->label('Ngày sinh')
								->class('datepicker')
					}}

					{{Former::xlarge_text('hometown')
								->label('Quê quán')
					}}

					{{Former::xlarge_text('class')
								->label('Lớp (*)')
					}}

					{{Former::xlarge_text('school_year')
								->label('Niên khóa')
					}}

					{{Former::xlarge_text('subject')
								->label('Chuyên ngành')
					}}

					{{Former::xlarge_text('email')
								->label('Email')
					}}

					{{Former::xlarge_text('phone')
								->label('Điện thoại')
					}}
					{{Former::actions()
							->large_primary_submit('Lưu')
							->large_inverse_reset('Nhập lại')
					}}

					{{Former::close();
					}}
				</div>
			</div>
		</div>
	</div>
</div>
@stop
