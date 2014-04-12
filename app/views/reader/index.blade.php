@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Danh sách bạn đọc
		</div>
		<div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small btn-primary' href='{{route('reader.create')}}'>
						<i class='i-plus-2'></i>
						Thêm mới bạn đọc
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='span7'>
				<div class='block'>
					<div class='content closed'>
						<ul class='boxes nmt'>
							<li>
								<div class='text-success'>
									<?php echo $count[Reader::SS_CIRCULATING] ?>
									<span><?php echo Reader::$LABELS[Reader::SS_CIRCULATING] ?></span>
								</div>
							</li>							
							<li>
								<div class='text-error'>
									<?php echo $count[Reader::SS_PAUSING] ?>
									<span><?php echo Reader::$LABELS[Reader::SS_PAUSING] ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class='space'></div>
		<div class='row-fluid'>
			<div class='block table-container'>
				<div class='head'>
					<h2>Hiển thị {{$readers->count()}}/{{$readers->getTotal()}} bạn đọc</h2>
					<div class='toolbar-table-right'>
						<div class='input-append'>
							<input placeholder='Tìm kiếm ...' type="text" class="table-search-input" data-url="{{route('reader.search')}}">
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
								<th style='width:10%'>Lớp</th>
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
									<td>{{$reader->class}}</td>
									<td>{{$reader->created_at->format('d/m/Y')}}</td>
									<td>{{Reader::$LABELS[$reader->status]}}</td>
									<td>
										<a class='text-info' href="{{route('reader.view',$reader->id)}}">
											<i class='i-magnifier'></i>
											Xem
										</a>
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
							{{$readers->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop
