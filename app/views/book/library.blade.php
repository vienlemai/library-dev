@extends('layouts.admin')
@section('content')
<div class="wrap">
<<<<<<< HEAD
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
							<input placeholder='Tìm kiếm ...' type="text" class="table-search-input"  data-url="{{route('book.library.search')}}">
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
							<?php $stt = $books->getFrom() ?>
							<?php foreach ($books as $book): ?>
								<tr>
									<td>
										{{$stt++}}
									</td>
									<td>{{$book->title }}</td>
									<td>{{$book->author}}</td>
									<td>{{$book->number}}</td>
									<td>{{'0'}}</td>
									<td>{{$book->published_at->format('h:i, d \t\h\á\n\g m, Y')}}</td>
									<td>
										<div class='row-actions'>
											<a class='text-info' href="javascript:void(0)" data-modal="show-modal" data-url='{{route('book.library.view',$book->id)}}'>
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
					<div class='side fr'>
						<div class='pagination'>
							{{$books->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
=======
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
                            <input placeholder='Tìm kiếm ...' type="text" class="table-search-input"  data-url="{{route('book.library.search')}}">
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
                                <th>Ngày lưu hành</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>					
                            <?php $stt = $books->getFrom() ?>
                            <?php foreach ($books as $book): ?>
                                <tr>
                                    <td>
                                        {{$stt++}}
                                    </td>
                                    <td>{{$book->title }}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->number}}</td>
                                    <td>{{$book->published_at->format('h:i, d \t\h\á\n\g m, Y')}}</td>
                                    <td>
                                        <div class='row-actions'>
                                            <a class='text-info' href="javascript:void(0)" data-modal="show-modal" data-url='{{route('book.library.view',$book->id)}}'>
                                                <i class='i-magnifier'></i>
                                                Xem
                                            </a>
                                             <a href="#" onclick="window.open('{{route('book.barcode',$book->id)}}')" class="text-warning"><i class="i-printer"></i> In mã vạch</a>
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
                            {{$books->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 55a153eb060f29103cb852ebf8ba126c94416690

</div>
@stop