<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if gt IE 8]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<![endif]-->
		<title>Thư viện online - Quản trị</title>
		<link rel="icon" type="image/ico" href="favicon.ico"/>
		<script type="text/javascript" src="{{{asset('js/all.js')}}}"></script>
		<link media="screen" rel="stylesheet" type="text/css" href="{{{ asset('css/all.css') }}}"/>

		<!--[if lte IE 7]>
		<script type='text/javascript' src='js/other/lte-ie7.js'></script>
		<![endif]-->

	</head>
	<body>

		<div id="wrapper" class="screen_wide ">
			<div id='header'>
				<div class='wrap'>
					<a class='logo' href='index.html'>
						Thư viện online | Quản trị
					</a>
					<div class='buttons fl'>
						<div class='item'>
							<a class='btn btn-primary btn-small c_layout' href='#' title='toggle sidebar'>
								<span class='i-layout-8'></span>
							</a>
						</div>
					</div>
					<div class='buttons'>
						<div class='item'>
							<a class='btn btn-primary btn-small' href='dang_nhap.html'>
								<span class='i-play'></span>
								Đăng nhập
							</a>
						</div>
					</div>
				</div>
			</div>


			<div id="layout">

				<div id='sidebar'>
					<div class='user'>
						<div class='pic'>
							<img src="{{{asset('img/default_avatar.png')}}}">
						</div>
						<div class='info'>
							<div class='name'>
								<a href='#'>Admin</a>
							</div>
							<div class='buttons'>
								<a href='#'>
									<span class='i-cog'></span>
									Tài khoản
								</a>
								<a class='fr' href='{{{ route('logout') }}}'>
									<span class='i-forward'></span>
									Đăng xuất
								</a>
							</div>
						</div>
					</div>
					<ul class='navigation'>
						<li class='active'>
							<a href='index.html'>Bảng điều khiển</a>
						</li>
						<li class='openable open'>
							<a href='#'>Lưu hành</a>
							<ul>
								<li class=''>
									<a href='muon_tra_tai_lieu.html'>Mượn trả tài liệu</a>
								</li>
								<li class=''>
									<a href='danh_sach_tai_lieu.html'>Danh sách tài liệu</a>
								</li>
								<li class=''>
									<a href='danh_sach_ban_doc.html'>Danh sách bạn đọc</a>
								</li>
								<li class=''>
									<a href='them_moi_ban_doc.html'>Thêm bạn đọc</a>
								</li>
								<li class=''>
									<a href='doc_gia_tre_han.html'>Độc giả trễ hạn</a>
								</li>
								<li class=''>
									<a href='lich_su_luu_thong.html'>Lịch sử lưu thông</a>
								</li>
							</ul>
						</li>
						<li class='openable open'>
							<a href='#'>Biên mục</a>
							<ul>
								<li class=''>
									<a href='bien_muc_tai_lieu.html'>Biên mục tài liệu</a>
								</li>
								<li class=''>
									<a href='xac_nhan_tai_lieu.html'>Xác nhận tài liệu</a>
								</li>
							</ul>
						</li>
						<li class='openable open'>
							<a href='#'>Thống kê</a>
							<ul>
								<li class=''>
									<a href='thong_ke_ban_doc.html'>Thống kê bạn đọc</a>
								</li>
								<li class=''>
									<a href='thong_ke_tai_lieu.html'>Thống kê tài liệu</a>
								</li>
							</ul>
						</li>
						<li class='openable open'>
							<a href='#'>
								Kiểm kê
							</a>
							<ul>
								<li class=''>
									<a href='lich_su_kiem_ke.html'>Lich sử kiểm kê</a>
								</li>
								<li class=''>
									<a href='tao_moi_kiem_ke.html'>Tạo mới kiểm kê</a>
								</li>
							</ul>
						</li>
						<li class='openable open'>
							<a href='#'>Quản lý hệ thống</a>
							<ul>
								<li class=''>
									<a href='nhan_vien.html'>Nhân viên</a>
								</li>
								<li class=''>
									<a href='quyen_han.html'>Quyền hạn</a>
								</li>
								<li class=''>
									<a href='kho_danh_muc_don_vi.html'>Kho - Danh mục - Đơn vị</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>


				<div id="content">
					@yield('content')

				</div>

			</div>
		</div>
		<script type="text/javascript" src="{{{asset('js/main.js')}}}"></script>
	</body>
</html>
