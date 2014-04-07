@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Danh sách bạn đọc
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
								<div class='text-info'>
									<?php echo $count[Reader::SS_BORROWING] ?>
									<span><?php echo Reader::$LABELS[Reader::SS_BORROWING] ?></span>
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
			<div class='block'>
				<div class='head'>
					<h2>Danh sách tất cả bạn đọc trong thư viện</h2>
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
					<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
						<thead>
							<tr>
								<th style='width:10%'>Mã thẻ</th>
								<th style='width:20%'>Họ tên</th>
								<th style='width:10%'>Lớp</th>
								<th style='width:15%'>Ngày đăng ký</th>
								<th style='width:20%'>Tình trạng</th>
								<th style='width:10%'>Đang mượn</th>
								<th style='width:10%'>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1001002</td>
								<td>Nguyễn Văn A</td>
								<td>CSGT 01</td>
								<td>1/1/2013</td>
								<td>Lưu thông</td>
								<td>3</td>
								<td>
									<a href='#'>Lịch sử</a>
								</td>
							</tr>
							
						</tbody>
					</table>
					<div class='table-info fl'>
						Đang hiển thị 6/15
					</div>
					<div class='side fr'>
						<div class='pagination'>
							<ul>
								<li class='disabled'>
									<a href='#'>«</a>
								</li>
								<li class='active'>
									<a href='#'>1</a>
								</li>
								<li>
									<a href='#'>2</a>
								</li>
								<li class='disabled'>
									<a href='#'>...</a>
								</li>
								<li>
									<a href='#'>6</a>
								</li>
								<li>
									<a href='#'>7</a>
								</li>
								<li>
									<a href='#'>»</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop
