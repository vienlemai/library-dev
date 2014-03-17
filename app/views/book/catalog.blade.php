@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Biên mục tài liệu
		</div>
		<div class='page-tools'>
			<ul>
				<li>
					<a class='btn btn-small btn-primary' href='them_moi_sach.html'>
						<i class='i-plus-2'></i>
						Thêm mới
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='span8'>
				<div class='block'>
					<div class='content closed'>
						<ul class='boxes nmt'>
							<li style="width: 24%">
								<div class='text-info'>
									<?php echo ($books[Book::SS_ADDED]->count()) ?>
									<span><?php echo Book::$_SS_LABEL[Book::SS_ADDED] ?></span>
								</div>
							</li>
							<li style="width: 24%">
								<div class='text-warning'>
									<?php echo ($books[Book::SS_SUBMITED]->count()) ?>
									<span><?php echo Book::$_SS_LABEL[Book::SS_SUBMITED] ?></span>
								</div>
							</li>
							<li style="width: 24%">
								<div class='text-error'>
									<?php echo ($books[Book::SS_DISAPPROVED]->count()) ?>
									<span><?php echo Book::$_SS_LABEL[Book::SS_DISAPPROVED] ?></span>
								</div>
							</li>

							<li style="width: 24%">
								<div class='text-success'>
									<?php echo ($books[Book::SS_PUBLISHED]->count()) ?>
									<span><?php echo Book::$_SS_LABEL[Book::SS_PUBLISHED] ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class='space'></div>
		<div class='row-fluid'>
			<ul class='nav nav-tabs'>
				<li class='active'>
					<a data-toggle='tab' href='#added'>Tài liệu đang biên mục</a>
				</li>
				<li>
					<a data-toggle='tab' href='#submitted'>Tài liệu đã gửi</a>
				</li>
				<li>
					<a data-toggle='tab' href='#disapproved'>Tài liệu lỗi</a>
				</li>
				<li>
					<a data-toggle='tab' href='#published'>Tài liệu đã lưu hành</a>
				</li>
			</ul>
			<div class='tab-content'>
				<div class='tab-pane active' id='added'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị 6/30 tài liệu</h2>
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
										<th style='width:5%'>
											<input class='checkall' type='checkbox'>
										</th>
										<th style='width:35%'>Tiêu đề</th>
										<th style='width:20%'>Tác giả</th>
										<th style='width:10%'>Số lượng</th>
										<th style='width:20%'>Thời gian</th>
										<th style='width:20%'>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($books[Book::SS_ADDED] as $book): ?>
										<tr>
											<td>
												<input name='checkbox' type='checkbox'>
											</td>
											<td>{{$book->title }}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->number}}</td>
											<td>{{$book->created_at}}</td>
											<td>
												<div class='row-actions'>
													<a class='text-info' href='#'>
														<i class='i-pencil'></i>
														Sửa
													</a>
													<a class='text-error' href='#'>
														<i class='i-cancel-2'></i>
														Xóa
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
										<li>
											<a href='#'>3</a>
										</li>
										<li class='disabled'>
											<a href='#'>...</a>
										</li>
										<li>
											<a href='#'>9</a>
										</li>
										<li>
											<a href='#'>10</a>
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
				<div class='tab-pane' id='submitted'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị 9/15 tài liệu</h2>
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
										<th style='width:4%'>TT</th>
										<th style='width:35%'>Tiêu đề</th>
										<th style='width:20%'>Tác giả</th>
										<th style='width:10%'>Số lượng</th>
										<th style='width:20%'>Thời gian</th>
										<th style='width:20%'>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($books[Book::SS_SUBMITED] as $book): ?>
										<tr>
											<td>1</td>
											<td>{{$book->title}}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->created_at}}</td>
											<td>
												<div class='row-actions'>
													<a class='text-info' href='#'>
														<i class='i-magnifier'></i>
														Xem
													</a>
												</div>
											</td>
										</tr>
										<<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class='footer'>
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
										<li>
											<a href='#'>3</a>
										</li>
										<li class='disabled'>
											<a href='#'>...</a>
										</li>
										<li>
											<a href='#'>9</a>
										</li>
										<li>
											<a href='#'>10</a>
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
				<!--Tab disapproved-->
				<div class='tab-pane' id='disapproved'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị 9/15 tài liệu</h2>
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
										<th style='width:4%'>TT</th>
										<th style='width:35%'>Tiêu đề</th>
										<th style='width:20%'>Tác giả</th>
										<th style='width:10%'>Số lượng</th>
										<th style='width:20%'>Thời gian</th>
										<th style='width:20%'>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($books[Book::SS_DISAPPROVED] as $book): ?>
										<tr>
											<td>1</td>
											<td>{{$book->title}}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->created_at}}</td>
											<td>
												<div class='row-actions'>
													<a class='text-info' href='#'>
														<i class='i-magnifier'></i>
														Xem
													</a>
												</div>
											</td>
										</tr>
										<<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class='footer'>
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
										<li>
											<a href='#'>3</a>
										</li>
										<li class='disabled'>
											<a href='#'>...</a>
										</li>
										<li>
											<a href='#'>9</a>
										</li>
										<li>
											<a href='#'>10</a>
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

				<!--Tab published-->
				<div class='tab-pane' id='disapproved'>
					<div class='block'>
						<div class='head'>
							<h2>Hiển thị 9/15 tài liệu</h2>
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
										<th style='width:4%'>TT</th>
										<th style='width:35%'>Tiêu đề</th>
										<th style='width:20%'>Tác giả</th>
										<th style='width:10%'>Số lượng</th>
										<th style='width:20%'>Thời gian</th>
										<th style='width:20%'>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($books[Book::SS_PUBLISHED] as $book): ?>
										<tr>
											<td>1</td>
											<td>{{$book->title}}</td>
											<td>{{$book->author}}</td>
											<td>{{$book->created_at}}</td>
											<td>
												<div class='row-actions'>
													<a class='text-info' href='#'>
														<i class='i-magnifier'></i>
														Xem
													</a>
												</div>
											</td>
										</tr>
										<<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class='footer'>
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
										<li>
											<a href='#'>3</a>
										</li>
										<li class='disabled'>
											<a href='#'>...</a>
										</li>
										<li>
											<a href='#'>9</a>
										</li>
										<li>
											<a href='#'>10</a>
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
	</div>

</div>
@stop