@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Tạo mới tài liệu
		</div>
		<div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small' href='{{route('book.catalog')}}'>
						<i class='i-reply'></i>
						Danh sách tài liệu
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='span12'>
				<div class='span6'>
					<div class='block'>
						<div class='head'>
							<h2>Nhập thông tin sách</h2>
						</div>
						<div class='content'>

							{{ Former::horizontal_open(route('book.save'))->method('POST') }}
							{{Former::xlarge_text('title')
								->label('Nhan đề')
							}}

							{{Former::xlarge_text('sub_title')
								->label('Nhan đề song song')
							}}

							{{Former::xlarge_text('author')
								->label('Tác giả')
							}}

							{{Former::xlarge_text('translator')
								->label('Dịch giả')
							}}

							{{Former::xlarge_text('publish_info')
								->label('Thông tin xuất bản')
							}}

							{{Former::xlarge_text('publisher')
								->label('Nhà xuất bản/Nơi xuất bản')
							}}

							{{Former::xlarge_text('printer')
								->label('Nhà in')
							}}

							{{Former::xlarge_text('pages')
								->label('Số trang')
							}}

							{{Former::xlarge_text('size')
								->label('Khổ cỡ')
							}}

							{{Former::xlarge_text('attach')
								->label('Tài liệu đính kèm')
							}}

						</div>
					</div>
				</div>
				<div class='span6'>
					<div class='block'>
						<div class='head'>
							<h2>Thông tin kiểm soát</h2>
						</div>
						<div class='content'>
							<div class="form-horizontal">
								{{Former::xlarge_text('organization')
									->label('Mã cơ quan')
								}}

								{{Former::xlarge_text('language')
									->label('Ngôn ngữ')
								}}

								{{Former::xlarge_text('cutter')
									->label('Số cutter')
								}}

								{{Former::xlarge_text('type_number')
									->label('Số phân loại')
								}}

								<!--								{{Former::xlarge_text('barcode')
																	->label('Mã vạch')
																	->disabled('disabled')
																}}-->

								{{Former::xlarge_text('price')
									->label('Giá tiền')
								}}

								<div class="control-group">
									<label class="control-label" for="storate">Nơi lưu trữ</label>
									<div class="controls">
										<select name="storage" id="storage" class="input-xlarge">
											{{$storageOptions}}
										</select>
									</div>
								</div>

								{{Former::xlarge_text('number')
									->label('Số lượng')
								}}

								{{Former::select('level')
									->label('Mức độ')
									->options($levels)								
								}}

								{{Former::textarea('another_infor')
									->label('Thông tin khác')
									->class('input-xlarge editor')
									->rows(4)
								}}								

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='footer'>
				<div class='text-center'>
					<button class='btn' type="reset">
						<i class='i-ccw'></i>
						Nhập lại
					</button>
					<button class='btn btn-primary'>
						<i class='i-checkmark-2'></i>
						Lưu tài liệu
					</button>
				</div>
			</div>
			<?php echo Former::close() ?>
		</div>
	</div>

</div>
@stop
