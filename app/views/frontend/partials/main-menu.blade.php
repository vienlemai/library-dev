<div class="header">
    <div id="menu">
        <ul>           
            <!-- Selected-->
            <li class="">
                <a href="<?php echo route('fe.home') ?>"><i class="fa fa-home"></i>  Trang chủ</a>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-list"></i>  Danh mục tài liệu</a>                
            </li>
            <li><a href="<?php echo route('fe.search') ?>"><i class="fa fa-search"></i> Tìm kiếm nâng cao</a></li>
            <li><a href="#"><i class="fa fa-shopping-cart"></i>  Giỏ sách</a></li>
            <?php if (Auth::check()): ?>
                <li id="user-box">
                    <a href="{{route('fe.logout')}}" role="button" data-toggle="modal">
                        <i class="fa fa-sign-in"></i>Đăng xuất
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>     
</div> 