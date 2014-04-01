@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Kiểm duyệt tài liệu
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='span8'>
				<div class='block'>
					<div class='content closed'>
						<ul class='boxes nmt'>
							<li style="width: 24%">
								<div class='text-warning'>
									<?php echo ($count[Book::SS_SUBMITED]) ?>
									<span><?php echo Book::$MOD_SS_LABEL[Book::SS_SUBMITED] ?></span>
								</div>
							</li>
							<li style="width: 24%">
								<div class='text-error'>
									<?php echo ($count[Book::SS_DISAPPROVED]) ?>
									<span><?php echo Book::$MOD_SS_LABEL[Book::SS_DISAPPROVED] ?></span>
								</div>
							</li>

							<li style="width: 24%">
								<div class='text-success'>
									<?php echo ($count[Book::SS_PUBLISHED]) ?>
									<span><?php echo Book::$MOD_SS_LABEL[Book::SS_PUBLISHED] ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@include('partials.flash')		
		<div class='space'></div>
		<div class='row-fluid'>
			<ul class='nav nav-tabs'>
				<li class="active">
					<a data-toggle='tab' href='#submitted'>Tài liệu đã gửi lên</a>
				</li>
				<li>
					<a data-toggle='tab' href='#disapproved'>Tài liệu đã báo lỗi</a>
				</li>
				<li>
					<a data-toggle='tab' href='#published'>Tài liệu đã lưu hành</a>
				</li>
			</ul>
			<div class='tab-content' id="book-catalog">
				<div class='tab-pane active' id='submitted'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị {{$books[Book::SS_SUBMITED]->count()}}/{{$books[Book::SS_SUBMITED]->getTotal()}} tài liệu</h2>
							<div class='toolbar-table-right'>
								<form action='' method='post'>
									<div class='input-append'>
										<input placeholder='Tìm kiếm ...' type='text'>
										<button class='btn' type='button'>
											<span class='icon-search'></span>
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="content np table-sorting">
							<table cellpadding='0' cellspacing='0' class='sort' width='100%'>
								<thead>
									<tr>
										<th>TT</th>
										<th>Tiêu đề</th>
										<th>Tác giả</th>
										<th>Số lượng</th>
										<th>Ngày gửi</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php $index = 1; ?>
									<?php foreach ($books[Book::SS_SUBMITED] as $book): ?>
										<tr>
											<td>{{$index++}}</td>
											<td>{{$book->title}}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->number}}</td>
											<td>{{$book->submitted_at->format('d/m/Y h:i').' ('.$book->submitted_at->diffForHumans().')'}}</td>
											<td>
												<div class='row-actions'>
													<a class='text-info' href='{{route('book.moderate.view',$book->id)}}'>
														<i class='i-magnifier'></i>
														Xem
													</a>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class='footer'>
							<span class="loading" style="margin-left: 50px; display: none">
								<img src="{{asset('img/loading.gif')}}"/>
								Đang tải . . .
							</span>
							<div class='side fr'>
								<div class='pagination'>
									{{$books[Book::SS_SUBMITED]->appends(array('type'=>Book::SS_SUBMITED))->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Tab disapproved-->
				<div class='tab-pane' id='disapproved'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị {{$books[Book::SS_DISAPPROVED]->count()}}/{{$books[Book::SS_DISAPPROVED]->getTotal()}} tài liệu</h2>
							<div class='toolbar-table-right'>
								<form action='' method='post'>
									<div class='input-append'>
										<input placeholder='Tìm kiếm ...' type='text'>
										<button class='btn' type='button'>
											<span class='icon-search'></span>
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class='content np table-sorting'>
							<table cellpadding='0' cellspacing='0' class='sort' width='100%'>
								<thead>
									<tr>
										<th>TT</th>
										<th>Tiêu đề</th>
										<th>Tác giả</th>
										<th>Số lượng</th>
										<th>Thời gian</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($books[Book::SS_DISAPPROVED] as $book): ?>
										<tr>
											<td>1</td>
											<td>{{$book->title}}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->number}}</td>
											<td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class='footer'>
							<span class="loading" style="margin-left: 50px; display: none">
								<img src="{{asset('img/loading.gif')}}"/>
								Đang tải . . .
							</span>
							<div class='side fr'>
								<div class='pagination'>
									{{$books[Book::SS_DISAPPROVED]->appends(array('type'=>Book::SS_DISAPPROVED))->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--Tab published-->
				<div class='tab-pane' id='published'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị {{$books[Book::SS_PUBLISHED]->count()}}/{{$books[Book::SS_PUBLISHED]->getTotal()}} tài liệu</h2>
							<div class='toolbar-table-right'>
								<form action='' method='post'>
									<div class='input-append'>
										<input placeholder='Tìm kiếm ...' type='text'>
										<button class='btn' type='button'>
											<span class='icon-search'></span>
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class='content np table-sorting'>
							<table cellpadding='0' cellspacing='0' class='sort' width='100%'>
								<thead>
									<tr>
										<th>TT</th>
										<th>Tiêu đề</th>
										<th>Tác giả</th>
										<th>Số lượng</th>
										<th>Ngày tạo</th>
										<th>Ngày lưu hành</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($books[Book::SS_PUBLISHED] as $book): ?>
										<tr>
											<td>1</td>
											<td>{{$book->title}}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->number}}</td>
											<td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
											<td>{{$book->published_at->format('d/m/Y h:i').' ('.$book->published_at->diffForHumans().')'}}</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class='footer'>
							<span class="loading" style="margin-left: 50px; display: none">
								<img src="{{asset('img/loading.gif')}}"/>
								Đang tải . . .
							</span>
							<div class='side fr'>
								<div class='pagination'>
									{{$books[Book::SS_PUBLISHED]->appends(array('type'=>Book::SS_PUBLISHED))->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop