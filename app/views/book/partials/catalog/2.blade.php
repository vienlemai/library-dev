<div class='head'>
	<h2>Hiển thị {{$books->count()}}/{{$books->getTotal()}} tài liệu</h2>
	<div class='toolbar-table-right'>
		<div class='input-append'>
			<input placeholder='Tìm kiếm ...' type="text" value="<?php echo isset($keyword) ? $keyword : '' ?>" class="table-search-input" book-type="{{Book::SS_DISAPPROVED}}" data-url="{{route('book.catalog.search')}}">
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
				<th>Ngày gửi</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = $books->getFrom(); ?>
			<?php foreach ($books as $book): ?>
				<tr>
					<td>{{$index++}}</td>
					<td>{{$book->title}}</td>
					<td>{{$book->author}}</td>
					<td>{{$book->number}}</td>
					<td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
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
	<div class='side fr'>
		<div class='pagination'>
			@if(isset($keyword))
			{{$books->appends(array('book-type'=>Book::SS_DISAPPROVED,'keyword'=>$keyword))->links()}}
			@else
			{{$books->appends(array('book-type'=>Book::SS_DISAPPROVED))->links()}}
			@endif
		</div>
	</div>
</div>