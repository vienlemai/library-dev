@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Thông tin tài liệu
		</div>
		<div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small' href='{{route('book.moderate')}}'>
						<i class='i-reply'></i>
						Danh sách tài liệu
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			@include('partials.flash')
			<div class="well-small">
				<div class="row-fluid">
					<div class="span4">
						<h4>{{$book->title}}</h4>
						<ul>
							<li>Người gửi : </li>
							<li>Ngày gửi : {{$book->submitted_at->format('d/m/Y h:i').' ('.$book->submitted_at->diffForHumans().')'}}</li>
						</ul>
					</div>
					<div class="span6">
						<button class="btn btn-primary" btn-confirm="confirm" data-url="{{route('book.publish',$book->id)}}" data-confirm="Bạn có chắc chắn cho lưu hành tài liệu {{$book->title}} ?">Đồng ý cho lưu hành</button>
						<button class="btn btn-danger" id="btn-disapprove-book" data-url="">Báo lỗi</button>
						<form method="POST" action="{{route('book.disapprove',$book->id)}}" style="display: none" id="form-disapprove-book">
							<div class="controls-row">
								<label class="control-label">Nhập lý do báo lỗi</label>
								<div class="controls">                 
									<textarea rows="5" name="reason" class="input-block-level editor"></textarea>
								</div>
							</div>
							<input type="hidden" name="_token" value="{{Session::token()}}"/>
							<button class="btn btn-primary" style="margin-left: 10px">Đồng ý</button>
						</form>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class='span6'>
					<div class='block'>
						<div class='head'>
							<h2>Thông tin tài liệu</h2>
						</div>
						<div class='content'>

							{{ Former::horizontal_open(route('book.save'))->method('POST') }}
							{{Former::xlarge_text('title')
								->label('Nhan đề')
								->value($book->title)
								->disabled()
							}}

							{{Former::xlarge_text('sub_title')
								->label('Nhan đề song song')
								->value($book->sub_title)
								->disabled()
							}}

							{{Former::xlarge_text('author')
								->label('Tác giả')
								->value($book->author)
								->disabled()
							}}

							{{Former::xlarge_text('translator')
								->label('Dịch giả')
								->value($book->translator)
								->disabled()
							}}

							{{Former::xlarge_text('publish_info')
								->label('Thông tin xuất bản')
								->value($book->publish_info)
								->disabled()
							}}

							{{Former::xlarge_text('publisher')
								->label('Nhà xuất bản/Nơi xuất bản')
								->value($book->publisher)
								->disabled()
							}}

							{{Former::xlarge_text('printer')
								->label('Nhà in')
								->value($book->printer)
								->disabled()
							}}

							{{Former::xlarge_text('pages')
								->label('Số trang')
								->value($book->pages)
								->disabled()
							}}

							{{Former::xlarge_text('size')
								->label('Khổ cỡ')
								->value($book->size)
								->disabled()
							}}

							{{Former::xlarge_text('attach')
								->label('Tài liệu đính kèm')
								->value($book->attach)
								->disabled()
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
									->value($book->organization)
									->disabled()
								}}

								{{Former::xlarge_text('language')
									->label('Ngôn ngữ')
									->value($book->language)
									->disabled()
								}}

								{{Former::xlarge_text('cutter')
									->label('Số cutter')
									->value($book->cutter)
									->disabled()
								}}

								{{Former::xlarge_text('type_number')
									->label('Số phân loại')
									->value($book->type_number)
									->disabled()
								}}

								<!--								{{Former::xlarge_text('barcode')
																	->label('Mã vạch')
																	->disabled('disabled')
																}}-->

								{{Former::xlarge_text('price')
									->label('Giá tiền')
									->value($book->price)
									->disabled()
								}}

								{{Former::xlarge_text('storate')
									->label('Kho')
									->value($path)
									->disabled()								
								}}

								{{Former::xlarge_text('number')
									->label('Số lượng')
									->value($book->number)
									->disabled()
								}}

								{{Former::select('level')
									->label('Mức độ')
									->options(array('1'=>'Kho A','2'=>'Kho B'),$book->level)
									->disabled()								
								}}

								<div class="control-group">
									<label for="price" class="control-label">Thông tin khác</label>
									<div class="controls">
										<?php echo $book->another_infor ?>
									</div>
								</div>						

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='footer'>

			</div>
			<?php echo Former::close() ?>
		</div>
	</div>

</div>
@stop
