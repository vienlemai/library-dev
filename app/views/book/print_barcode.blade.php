@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Thêm mới sách
		</div>
		<div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small' href='bien_muc_tai_lieu.html'>
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
							<h2>Thông tin sách</h2>
						</div>
						<div class='content np'>

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
						<div class='content np'>
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

								{{Former::select('storate')
									->label('Kho')
									->options(array('1'=>'Kho A','2'=>'Kho B'),$book->storate)
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

								{{Former::textarea('another_infor')
									->label('Thông tin khác')
									->class('input-xlarge')
									->rows(4)
									->value($book->another_infor)
									->disabled()
								}}								

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='footer'>
				<div class='text-center'>
					<button class="btn btn-primary" type="button" id="btnPrintBarcode" data-url="{{ route('book.generate-barcode') }}">
						In mã vạch
					</button>
				</div>
			</div>
			<?php echo Former::close() ?>
		</div>
	</div>

</div>
@stop
