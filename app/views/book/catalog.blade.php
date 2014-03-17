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
			<div class='span7'>
				<div class='block'>
					<div class='content closed'>
						<ul class='boxes nmt'>
							<li>
								<div class='text-info'>
									5
									<span>Đang biên mục</span>
								</div>
							</li>
							<li>
								<div class='text-warning'>
									10
									<span>Chưa xác nhận</span>
								</div>
							</li>
							<li>
								<div class='text-success'>
									15
									<span>Đã lưu hành</span>
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
					<a data-toggle='tab' href='#first'>Tài liệu đang biên mục</a>
				</li>
				<li>
					<a data-toggle='tab' href='#second'>Tài liệu đã gửi</a>
				</li>
			</ul>
			<div class='tab-content'>
				<div class='tab-pane active' id='first'>
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
										<th style='width:10%'>Thể loại</th>
										<th style='width:30%'>Thời gian</th>
										<th style='width:20%'>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input name='checkbox' type='checkbox'>
										</td>
										<td>Cánh buồm đỏ thắm</td>
										<td>Sách</td>
										<td>07:50, 12 Tháng 3, 2014 (3 ngày trước)</td>
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
									<tr>
										<td>
											<input name='checkbox' type='checkbox'>
										</td>
										<td>Khu vườn bí mật</td>
										<td>Sách</td>
										<td>09:35, 10 Tháng 3, 2014 (5 ngày trước)</td>
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
									<tr>
										<td>
											<input name='checkbox' type='checkbox'>
										</td>
										<td>Thông tin công nghệ số 3</td>
										<td>Tạp chí</td>
										<td>15:40, 10 Tháng 3, 2014 (5 ngày trước)</td>
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
									<tr>
										<td>
											<input name='checkbox' type='checkbox'>
										</td>
										<td>Đắc nhân tâm</td>
										<td>Sách</td>
										<td>15:40, 10 Tháng 3, 2014 (5 ngày trước)</td>
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
									<tr>
										<td>
											<input name='checkbox' type='checkbox'>
										</td>
										<td>Mẫu đơn xin kết nạp Đảng</td>
										<td>Biểu mẫu</td>
										<td>17:20, 5 Tháng 3, 2014 (10 ngày trước)</td>
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
									<tr>
										<td>
											<input name='checkbox' type='checkbox'>
										</td>
										<td>Đồi gió hú</td>
										<td>Sách</td>
										<td>17:20, 5 Tháng 3, 2014 (10 ngày trước)</td>
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
				<div class='tab-pane' id='second'>
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
										<th style='width:10%'>Mã</th>
										<th style='width:33%'>Tiêu đề</th>
										<th style='width:15%'>Trạng thái</th>
										<th style='width:30%'>Thời gian</th>
										<th style='width:8%'>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>100-001</td>
										<td>Cánh buồm đỏ thắm</td>
										<td>Đang chờ xác nhận</td>
										<td>07:50, 12 Tháng 3, 2014 (3 ngày trước)</td>
										<td>
											<div class='row-actions'>
												<a class='text-info' href='#'>
													<i class='i-magnifier'></i>
													Xem
												</a>
											</div>
										</td>
									</tr>
									<tr class='success'>
										<td>4</td>
										<td>101-014</td>
										<td>Đắc nhân tâm</td>
										<td>Đã duyệt</td>
										<td>15:40, 10 Tháng 3, 2014 (5 ngày trước)</td>
										<td>
											<div class='row-actions'>
												<a class='text-info' href='#'>
													<i class='i-magnifier'></i>
													Xem
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>100-002</td>
										<td>Khu vườn bí mật</td>
										<td>Đang chờ xác nhận</td>
										<td>09:35, 10 Tháng 3, 2014 (5 ngày trước)</td>
										<td>
											<div class='row-actions'>
												<a class='text-info' href='#'>
													<i class='i-magnifier'></i>
													Xem
												</a>
											</div>
										</td>
									</tr>
									<tr class='success'>
										<td>3</td>
										<td>100-012</td>
										<td>Thông tin công nghệ số 3</td>
										<td>Đã duyệt</td>
										<td>15:40, 10 Tháng 3, 2014 (5 ngày trước)</td>
										<td>
											<div class='row-actions'>
												<a class='text-info' href='#'>
													<i class='i-magnifier'></i>
													Xem
												</a>
											</div>
										</td>
									</tr>
									<tr class='success'>
										<td>5</td>
										<td>110-167</td>
										<td>Mẫu đơn xin kết nạp Đảng</td>
										<td>Đã duyệt</td>
										<td>17:20, 5 Tháng 3, 2014 (10 ngày trước)</td>
										<td>
											<div class='row-actions'>
												<a class='text-info' href='#'>
													<i class='i-magnifier'></i>
													Xem
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td>116-092</td>
										<td>Đồi gió hú</td>
										<td>Đang chờ xác nhận</td>
										<td>17:20, 5 Tháng 3, 2014 (10 ngày trước)</td>
										<td>
											<div class='row-actions'>
												<a class='text-info' href='#'>
													<i class='i-magnifier'></i>
													Xem
												</a>
											</div>
										</td>
									</tr>
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