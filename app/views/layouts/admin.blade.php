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
		<script type="text/javascript" src="{{{asset('js/bootbox.min.js')}}}"></script>
		<script type="text/javascript" src="{{{asset('js/jquery.validate.min.js')}}}"></script>
		<script type="text/javascript" src="{{{asset('js/tinymce/tinymce.min.js')}}}"></script>
		<script type="text/javascript" src="{{{asset('js/actions.js')}}}"></script>
		<link media="screen" rel="stylesheet" type="text/css" href="{{{ asset('css/select2.css') }}}"/>
		<link media="screen" rel="stylesheet" type="text/css" href="{{{ asset('css/all.css') }}}"/>
		<link media="screen" rel="stylesheet" type="text/css" href="{{{ asset('css/be/lht.css') }}}"/>
		<link media="screen" rel="stylesheet" type="text/css" href="{{{ asset('css/be/vlm.css') }}}"/>

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
				</div>
			</div>


			<div id="layout">

				<div id='sidebar'>
					<div class='user'>
						<div class='pic'>
							<img src="{{{asset('img/default_avatar.png')}}}">
						</div>
						<div class='info'>
							<div class='name'
								 <a href='#'>{{Sentry::check()?Sentry::getUser()->email:''}}</a>
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
						<li class='disabled'>
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
									<a href="{{route('book.catalog')}}">Biên mục tài liệu</a>
								</li>
								<li class=''>
									<a href='{{route('book.moderate')}}'>Xác nhận tài liệu</a>
								</li>
							</ul>
						</li>
						<li class='disabled'>
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
						<li class='disabled'>
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
									<a href='{{route('user.create')}}'>Nhân viên</a>
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
		<script type="text/javascript" src="{{{asset('js/select2.js')}}}"></script>
		<script type="text/javascript" src="{{{asset('js/be/vlm.js')}}}"></script>
		<script type="text/javascript" src="{{{asset('js/be/lht.js')}}}"></script>
	</body>
</html>
