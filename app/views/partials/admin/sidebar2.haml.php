#sidebar
  .user
    .pic
      %img(src=asset('img/default_avatar.png'))
    .info
      .name
        %a 
          = ucfirst(Sentry::check()?Sentry::getUser()->email:'')
      .buttons
        %a(href="#")
          %span.i-cog
          Tài khoản
        %a.fr(href=route('logout'))
          %span.i-forward
          \Đăng xuất
  %ul.navigation
    %li.active
      %a(href=route('home')) Bảng điều khiển
    %li.openable.open
      %a(href="#") Lưu hành
      %ul
        %li
          %a(href="#") Mượn trả tài liệu
        %li
          %a(href="#") Danh sách tài liệu
        %li
          %a(href=route('readers')) Danh sách bạn đọc
        %li
          %a(href=route('reader.create')) Thêm bạn đọc
        %li
          %a(href="#") Độc giả trễ hạn
        %li
          %a(href="#") Lịch sử lưu thông
    %li.openable.open
      %a(href="#") Biên mục
      %ul
        %li
          %a(href=route('book.catalog')) Biên mục tài liệu
        %li
          %a(href=route('book.moderate')) Xác nhận tài liệu
    %li.disabled
      %a(href="#") Thống kê
      %ul
        %li
          %a(href="thong_ke_ban_doc.html") Thống kê bạn đọc
        %li
          %a(href="thong_ke_tai_lieu.html") Thống kê tài liệu
    %li.disabled
      %a(href="#")
        Kiểm kê
      %ul
        %li
          %a(href="lich_su_kiem_ke.html") Lich sử kiểm kê
        %li
          %a(href="tao_moi_kiem_ke.html") Tạo mới kiểm kê
    %li.openable.open
      %a(href="#") Quản lý hệ thống
      %ul
        %li
          %a(href=route('user.create')) Nhân viên
        %li
          %a(href=route('configs')) Cấu hình