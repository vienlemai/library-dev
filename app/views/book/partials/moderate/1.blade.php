<div class='head'>
	<h2>Hiển thị {{$books->count()}}/{{$books->getTotal()}} tài liệu</h2>
	<div class='toolbar-table-right'>
		<div class='input-append'>
			<input placeholder='Tìm kiếm ...' type="text" value="{{isset($keyword)?$keyword:""}}" class="table-search-input" book-type="{{Book::SS_ADDED}}" data-url="{{route('book.catalog.search')}}">
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
				<th style='width:5%'>
					<input class='checkall' type='checkbox'>
				</th>
				<th>Tiêu đề</th>
				<th>Tác giả</th>
				<th>Số lượng</th>
				<th>Thời gian</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
		<form action="{{route('book.submit')}}" method="POST" class="form-check">
			<?php foreach ($books as $book): ?>
				<tr>
					<td>
						<input name="bookId[]" value="{{$book->id}}" class="checkitem" type='checkbox'>
					</td>
					<td>{{$book->title }}</td>
					<td>{{$book->author}}</td>
					<td>{{$book->number}}</td>
					<td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
					<td>
						<div class='row-actions'>
							<a class='text-info' href="{{route('book.preview',$book->id)}}">
								<i class='i-magnifier'></i>Xem
							</a>
							<a class='text-warning' href='{{route('book.edit',$book->id)}}'>
								<i class='i-pencil'></i>Sửa
							</a>
							<a class='text-error' href='{{route('book.delete',$book->id)}}' data-confirm="Bạn có chắc chắn muốn xóa tài liệu {{$book->title}}" data-method="delete" data-token="{{csrf_token()}}">
								<i class='i-cancel-2'></i>Xóa
							</a>			
						</div>
					</td>
				</tr>
			<?php endforeach; ?>	
		</form>
		</tbody>
	</table>
</div>
<div class='footer'>
	<button class="btn btn-primary btn-large btn-check-submit" data-url="{{route('book.submit')}}">Gửi đi kiểm duyệt</button>
	<span class="check-info" style="display: none">Đã chọn 2 mục</span>
	<span class="loading" style="margin-left: 50px; display: none">
		<img src="{{asset('img/loading.gif')}}"/>
		Đang tải . . .
	</span>
	<div class='side fr'>
		<div class='pagination'>
			{{$books->appends(array('type'=>Book::SS_ADDED))->links()}}
		</div>
	</div>
</div>