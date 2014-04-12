@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Danh sách tài liệu đang lưu hành
		</div>
	</div>
	<div class='content'>
		@include('partials.flash')		
		<div class='space'></div>
		<div class='row-fluid'>
			<div class='block table-container'>
				<div class='head'>
					<h2>Hiển thị {{$books->count()}}/{{$books->getTotal()}} tài liệu</h2>
					<div class='toolbar-table-right'>
						<div class='input-append'>
							<input placeholder='Tìm kiếm ...' type="text" class="table-search-input" book-type="{{Book::SS_ADDED}}" data-url="{{route('book.catalog.search')}}">
							<button class="btn btn-book-search" type="button">
								<span class='icon-search'></span>
							</button>
						</div>
					</div>
				</div>
				<div class='content np table-sorting'>
					<table cellpadding='0' cellspacing='0' class='sort' width='100%'>
						<thead>
							<tr>
								<th style='width:5%'>TT</th>
								<th>Tiêu đề</th>
								<th>Tác giả</th>
								<th>Số lượng</th>
								<th>Cho mượn</th>
								<th>Ngày lưu hành</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>					
							<?php $stt = 1; ?>
							<?php foreach ($books as $book): ?>

								<tr>
									<td>
										{{$stt++}}
									</td>
									<td>{{$book->title }}</td>
									<td>{{$book->author}}</td>
									<td>{{$book->number}}</td>
									<td>aaa</td>
									<td>{{$book->published_at->format('h:i,\ngày d \tháng m, Y').' ('.$book->created_at->diffForHumans().')'}}</td>
									<td>
										<div class='row-actions'>
											<a class='text-info' href="#">
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
					<button class="btn btn-primary btn-large btn-check-submit" data-url="{{route('book.submit')}}">Gửi đi kiểm duyệt</button>
					<span class="check-info" style="display: none"></span>
					<span class="loading" style="margin-left: 50px; display: none">
						<img src="{{asset('img/loading.gif')}}"/>
						Đang tải . . .
					</span>
					<div class='side fr'>
						<div class='pagination'>
							{{$books->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop