<div class='head'>
	<h2>Hiển thị {{$books->count()}}/{{$books->getTotal()}} tài liệu</h2>
	<div class='toolbar-table-right'>
		<div class='input-append'>
			<input placeholder='Tìm kiếm ...' type="text" class="table-search-input"  value="{{isset($keyword)?$keyword:''}}" data-url="{{route('book.library.search')}}">
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
					<td>0</td>
					<td>{{$book->published_at->format('h:i, d \t\h\á\n\g m, Y')}}</td>
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
	<span class="loading" style="margin-left: 50px; display: none">
		<img src="{{asset('img/loading.gif')}}"/>
		Đang tải . . .
	</span>
	<div class='side fr'>
		<div class='pagination'>
			@if(isset($keyword))
			{{$books->appends(array('keyword'=>$keyword))->links()}}
			@else
			{{$books->links()}}
			@endif
		</div>
	</div>
</div>