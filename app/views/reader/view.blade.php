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
					<div class="span4">
						<form action="{{route('upload.image')}}" upload-type="readers" class="form-horizontal form-upload-image" method="POST">
							<!--							<div class="control-group">
															<label class="control-label" for="avatar">Ảnh đại diện (*)</label>
															<div class="controls">
																<input type="file" class="input-choose-image" name="image"/>
															</div>
														</div>-->
							<div class="control-group">
								<div class="controls">
									<img class="image-preview" src="{{$reader->avatar}}" width="100" height="100"/>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<h4>Thông tin kiểm soát</h4>
									<ul>
										<li>Ngày tạo: {{$reader->created_at->format('d/m/Y')}}</li>
										<li>Ngày hết hạn: {{$reader->expired_at->format('d/m/Y')}}</li>
										<li>Người tạo: </li>
									</ul>
								</div>
							</div>
							<input type="hidden" class="crsf-token" name="token" value="{{Session::token()}}"/>	
							<input type="hidden" class="old-file" value=""/>
						</form>
						<div class="alert alert-error upload-error" style="display: none">           
							<span></span>
							<button type="button" class="close" data-dismiss="alert">×</button>
						</div>
						<div class="progress progress-info progress-small upload-progress" style="display: none">
							<div class="bar tip" title="" style="width: 0%"></div>
						</div>


					</div>
					<div class="span8">
						@include('partials.flash')
						<?php if ($errors->has('avatar')): ?>
							<div class="alert alert-error upload-error">           
								{{$errors->first('avatar')}}
								<button type="button" class="close" data-dismiss="alert">×</button>
							</div>
						<?php endif; ?>
						{{ Former::horizontal_open(route('reader.save'))->method('POST') }}
						{{Former::xlarge_text('full_name')
								->label('Họ tên (*)')
								->value($reader->full_name)
								->disabled()
						}}

						{{Former::xlarge_text('year_of_birth')
								->label('Ngày sinh')
								->class('datepicker')
								->value($reader->year_of_birth)
								->disabled()
						}}

						{{Former::xlarge_text('hometown')
								->label('Quê quán')
								->value($reader->hometown)
								->disabled()
						}}

						{{Former::xlarge_text('class')
								->label('Lớp (*)')
								->value($reader->class)
								->disabled()
						}}

						{{Former::xlarge_text('school_year')
								->label('Niên khóa')
								->value($reader->school_year)
								->disabled()
						}}

						{{Former::xlarge_text('subject')
								->label('Chuyên ngành')
								->value($reader->subject)
								->disabled()
						}}

						{{Former::xlarge_text('email')
								->label('Email (*)')
								->value($reader->email)
								->disabled()
						}}

						{{Former::xlarge_text('phone')
								->label('Điện thoại')
								->value($reader->phone)
								->disabled()
						}}
						<div class="form-actions">
							<a class="btn btn-primary" target="_blank" href="{{route('reader.card',$reader->id)}}">Tạo mã thẻ</a>
							<a class="btn btn-success" href="#">Lịch sử mượn trả</a>
							<a class="btn btn-danger" href="#">Khóa thẻ</a>
						</div>
						{{Former::close();
						}}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
