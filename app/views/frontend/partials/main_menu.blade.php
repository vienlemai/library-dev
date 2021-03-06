<div class="header">
    <div id="banner">
        <img src="<?php echo asset('banner/banner.jpg') ?>">
    </div>
    <div id="menu">
        <ul>           
            <!-- Selected-->
            <li>
                <a href="<?php echo route('fe.home') ?>"><i class="fa fa-home"></i>  Trang chủ</a>
            </li>
            <li>
                <a href="<?php echo route('fe.articles') ?>"><i class="fa fa-bullhorn"></i>  Thông báo</a>
            </li>            
            <li><a href="<?php echo route('fe.search') ?>"><i class="fa fa-search"></i> Tìm kiếm</a></li>
            <li class="dropdown" id="category-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-list"></i> Danh mục tài liệu
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <?php echo $storage_html ?>
                </ul>
            </li>

            <?php if (Auth::check()): ?>
                <?php
                $books_count = count($books_in_cart);
                ?>
                <li><a href="<?php echo route('fe.cart') ?>"><i class="fa fa-shopping-cart"></i>  Giỏ sách (<span id='books-counter'><?php echo $books_count ?></span>)</a></li>
                <li class="dropdown" id="user-box_">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> Trang cá nhân
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo route('fe.account') ?>" > Thông tin tài khoản </a>
                        </li>
                        <li><a href="<?php echo route('fe.borrowing')?>">Tài liệu đang mượn</a></li>
                        <li><a href="<?php echo route('fe.orders')?>">Tài liệu đã đăng ký</a></li>
                        <li><a href="<?php echo route('fe.history')?>">Lịch sử mượn / trả</a></li>
                        <li class="divider"></li>
                        <li class=""> 
                            <a href="{{route('fe.logout')}}" role="button" data-toggle="modal">
                                <i class="fa fa-sign-out"></i>  Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>

            <?php else: ?>
                <li class="dropdown" id="user-box_">
                    <a href="{{route('fe.login')}}"><i class="fa fa-sign-in"></i>  Đăng nhập</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>     
</div> 