<div class='head'>
	<h2>Hiển thị {{$readers->count()}}/{{$readers->getTotal()}} bạn đọc</h2>
	<div class='toolbar-table-right'>
		<div class='input-append'>
			<input placeholder='Tìm kiếm ...' type="text" class="table-search-input" value="<?php echo isset($keyword) ? $keyword : '' ?>" data-url="{{route('reader.search')}}">
			<button class="btn btn-book-search" type="button">
				<span class='icon-search'></span>
			</button>
		</div>
	</div>
</div>
<div class='content np table-sorting'>
	<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
		<thead>
			<tr>
				<th style='width:10%'>Mã thẻ</th>
				<th style='width:20%'>Họ tên</th>
				<th style='width:10%'>Loại bạn đọc</th>
				<th style='width:15%'>Ngày đăng ký</th>
				<th style='width:20%'>Tình trạng</th>
				<th style='width:10%'>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($readers as $reader): ?>
				<tr>
					<td>{{$reader->barcode}}</td>
					<td>{{$reader->full_name}}</td>
					<td>{{$reader->reader_type}}</td>
					<td>{{$reader->created_at->format('d/m/Y')}}</td>
					<td>{{Reader::$LABELS[$reader->status]}}</td>
					<td>
					</td>
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>
<div class="footer">
	<span class="loading" style="margin-left: 50px; display: none">
		<img src="{{asset('img/loading.gif')}}"/>
		Đang tải . . .
	</span>
	<div class='side fr'>
		<div class='pagination'>
			@if(isset($keyword))
			{{$readers->appends('keyword',$keyword)->links()}}
			@else
			{{$readers->links()}}
			@endif
		</div>
	</div>
</div>