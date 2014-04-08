<div class='head'>
	<h2>Hiển thị {{$books->count()}}/{{$books->getTotal()}} tài liệu</h2>
	<div class='toolbar-table-right'>
		<div class='input-append'>
			<input placeholder='Tìm kiếm ...' type="text" value="<?php echo isset($keyword)?$keyword:'' ?>" class="table-search-input" book-type="{{Book::SS_PUBLISHED}}" data-url="{{route('book.catalog.search')}}">
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
				<th>TT</th>
				<th>Tiêu đề</th>
				<th>Tác giả</th>
				<th>Số lượng</th>
				<th>Ngày tạo</th>
				<th>Ngày lưu hành</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; ?>
			<?php foreach ($books as $book): ?>
				<tr>
					<td><?php $index++ ?></td>
					<td>{{$book->title}}</td>
					<td>{{$book->author}}</td>
					<td>{{$book->number}}</td>
					<td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
					<td>{{$book->published_at->format('d/m/Y h:i').' ('.$book->published_at->diffForHumans().')'}}</td>
					<td>
						<div class='row-actions'>
							<a class='text-info' href='{{route('book.catalog.view',$book->id)}}'>
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
			{{$books->appends(array('book-type'=>Book::SS_ADDED,'keyword'=>$keyword))->links()}}
			@else
			{{$books->appends(array('book-type'=>Book::SS_ADDED))->links()}}
			@endif
		</div>
	</div>
</div>