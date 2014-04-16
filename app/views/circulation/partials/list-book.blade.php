@extends('layouts.admin')
@section('content')
<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			Mượn trả tài liệu
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='span12'>
				<div class='span6'>
					<div class='block'>
						<div class='head'>
							<h2>Thông tin bạn đọc</h2>
							<ul class='buttons'>
								<li>
									<a class='block_toggle' href='#'>
										<i class='i-arrow-down-3'></i>
									</a>
								</li>
							</ul>
						</div>
						<div class='content np'>
							<div class='span5'>
								<div class='content-row'>
									<form url='/'>
										<input class='barcode-scanner' placeholder='Mã thẻ' type='text'>
									</form>
								</div>
								<div class='avatar-select-wrapper'>
									<div class='avatar'>
                                        <img src='img/sample_avatar.jpg' height="100" width="100">
									</div>
								</div>
								<div class='content-row'>
									<div class='span4'>Ngày tạo:</div>
									<div class='span8'>
										10/04/2013
									</div>
								</div>
								<div class='content-row'>
									<div class='span4'>Hết hạn:</div>
									<div class='span8'>
										10/4/2014
									</div>
								</div>
								<div class='content-row'>
									<a class='btn btn-primary' href='#'>
										<i class='i-time'></i>
										Lịch sử
									</a>
									<a class='btn btn-warning' href='#'>
										<i class='i-locked'></i>
										Khóa thẻ
									</a>
								</div>
							</div>
							<div class='span7'>
								<div class='content-row'>
									<div class='span5'>Họ tên:</div>
									<div class='span7'>
										Hồ Thành Luân
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Ngày sinh:</div>
									<div class='span7'>
										26/01/1990
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Quê quán:</div>
									<div class='span7'>
										Đà Nẵng
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Địa chỉ email:</div>
									<div class='span7'>
										vienlemail@gmail.com
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Lớp:</div>
									<div class='span7'>
										10T1
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Niên khóa:</div>
									<div class='span7'>
										2010 - 2015
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Chuyên nghành:</div>
									<div class='span7'>
										CNTT
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Mượn tại chỗ:</div>
									<div class='span7'>
										1/3
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>Mượn về:</div>
									<div class='span7'>
										4/5
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='span6'>
					<div class='block'>
						<div class='head'>
							<h2>Quét tài liệu</h2>
							<ul class='buttons'>
								<li>
									<a class='block_toggle' href='#'>
										<i class='i-arrow-down-3'></i>
									</a>
								</li>
							</ul>
						</div>
						<div class='content np'>
							<div class='span5'>
								<div class='content-row'>
									<form>
										<input class='barcode-scanner' placeholder='Mã tài liệu' type='text'>
									</form>
								</div>
								<div class='book-cover-wrapper'>
									<div class='book-cover'>
										<img class='book-cover' src='img/canh_dong_bat_tan.jpg'>
									</div>
								</div>
								<div class='content-row'>
									<div class='span6'>Ngày lưu hành:</div>
									<div class='span6'>
										10/04/2013
									</div>
								</div>
								<div class='content-row'>
									<div class='span6'>Trang thái:</div>
									<div class='span6'>
										Đang cho mượn
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										<button class='btn btn-primary'>
											<i class='i-arrow-up-6'></i>
											Mượn
										</button>
									</div>
									<div class='span5'>
										<button class='btn btn-warning'>
											<i class='i-arrow-down-6'></i>
											Trả
										</button>
									</div>
								</div>
							</div>
							<div class='span7'>
								<div class='content-row'>
									<div class='span5'>
										Tiêu đề:
									</div>
									<div class='span7'>
										Cánh đồng bất tận
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Thể loại:
									</div>
									<div class='span7'>
										Sách
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Phân loại:
									</div>
									<div class='span7'>
										Tiểu thuyết
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Tài liệu kèm theo:
									</div>
									<div class='span7'>
										CD
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Kho:
									</div>
									<div class='span7'>
										A
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Bạn đọc:
									</div>
									<div class='span7'>
										Lê Mai Viện
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Ngày mượn:
									</div>
									<div class='span7'>
										8:30, Ngày 8/3/2014
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Ngày trả:
									</div>
									<div class='span7'>
										8/4/2014
									</div>
								</div>
								<div class='content-row'>
									<div class='span5'>
										Số lần gia hạn:
									</div>
									<div class='span7'>
										1
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row-fluid'>
			<div class='span12'>
				<div class='block'>
					<div class='head'>
						<h2>Tài liệu đang mượn</h2>
						<ul class='buttons'>
							<li>
								<a class='block_toggle' href='#'>
									<i class='i-arrow-down-3'></i>
								</a>
							</li>
						</ul>
					</div>
					<div class='content np'>
						<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
							<thead>
								<tr>
									<th style='width:5%'>Số DKCB</th>
									<th style='width:20%'>Tiêu đề</th>
									<th style='width:10%'>Thể loại</th>
									<th style='width:15%'>Ngày mượn</th>
									<th style='width:15%'>Ngày trả</th>
									<th style='width:10%'>Kho</th>
									<th style='width:12%'>Ghi chú</th>
									<th style='width:13%'>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>B1200</td>
									<td>Cánh buồm đỏ thắm</td>
									<td>Sách</td>
									<td>03:15, 12/03/2014</td>
									<td>12 Tháng 3, 2014</td>
									<td>A</td>
									<td>Còn 0 lần gia hạn</td>
									<td>
										<div class='row-actions'>
											<a class='text-info' href='#'>
												<i class='i-arrow-down-6'></i>
												Trả
											</a>
											<a class='text-disabled' href='#'>
												<i class='i-plus'></i>
												Gia hạn
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>B1201</td>
									<td>Khu vườn bí mật</td>
									<td>Sách</td>
									<td>7:10, 10/03/2014</td>
									<td>1/04/2014</td>
									<td>B</td>
									<td>Còn 2 lần gia hạn</td>
									<td>
										<div class='row-actions'>
											<a class='text-info' href='#'>
												<i class='i-arrow-down-6'></i>
												Trả
											</a>
											<a class='text-warning' href='#'>
												<i class='i-plus'></i>
												Gia hạn
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>B1393</td>
									<td>Thông tin công nghệ số 3</td>
									<td>Tạp chí</td>
									<td>10 Tháng 3, 2014</td>
									<td>10 Tháng 3, 2014</td>
									<td>C</td>
									<td></td>
									<td>
										<div class='row-actions'>
											<a class='text-info' href='#'>
												<i class='i-arrow-down-6'></i>
												Trả
											</a>
											<a class='text-warning' href='#'>
												<i class='i-plus'></i>
												Gia hạn
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>B12030</td>
									<td>Đắc nhân tâm</td>
									<td>Sách</td>
									<td>10 Tháng 3, 2014</td>
									<td>10 Tháng 3, 2014</td>
									<td>D</td>
									<td>Còn 1 lần gia hạn</td>
									<td>
										<div class='row-actions'>
											<a class='text-info' href='#'>
												<i class='i-arrow-down-6'></i>
												Trả
											</a>
											<a class='text-warning' href='#'>
												<i class='i-plus'></i>
												Gia hạn
											</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class='table-info fl'>
							Đang hiển thị 4/5
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
@stop
