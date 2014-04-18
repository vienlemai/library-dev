<div id='sidebar'>
    <div class='user'>
        <div class='pic'>
            <img src="{{asset('img/default_avatar.png')}}">
        </div>
        <div class='info'>
            <div class='name'
                 <a href='#'>{{ucfirst(Sentry::check()?Sentry::getUser()->email:'')}}</a>
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
            <a href='{{route('home')}}'>Bảng điều khiển</a>
        </li>
        <li class='openable open'>
            <a href='#'>Lưu hành</a>
            <ul>
                <li class=''>
                    <a href='{{route('circulation')}}'>Mượn trả tài liệu</a>
                </li>
                <li class=''>
                    <a href='{{route('book.library')}}'>Danh sách tài liệu</a>
                </li>
                <li class=''>
                    <a href='{{route('readers')}}'>Danh sách bạn đọc</a>
                </li>
                <li class=''>
                    <a href='{{route('reader.create')}}'>Thêm bạn đọc</a>
                </li>
                <li class=''>
                    <a href='#'>Độc giả trễ hạn</a>
                </li>
                <li class=''>
                    <a href='#'>Lịch sử lưu thông</a>
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
                <li class=''>
                    <a href='{{route('configs')}}'>Cấu hình</a>
                </li>
            </ul>
        </li>
    </ul>
</div>