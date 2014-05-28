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
            <li><a href="<?php echo route('fe.search') ?>"><i class="fa fa-search"></i> Tìm kiếm</a></li>


            <?php if (Auth::check()): ?>
                <?php
                $books_count = count($books_in_cart);

                ?>
                <li><a href="<?php echo route('fe.cart') ?>"><i class="fa fa-shopping-cart"></i>  Giỏ sách (<span id='books-counter'><?php echo $books_count ?></span>)</a></li>
                <li id="user-box">
                    <a href="<?php echo route('fe.profile') ?>" > <i class="fa fa-user"></i> Trang cá nhân </a>
                    <a href="{{route('fe.logout')}}" role="button" data-toggle="modal">
                        <i class="fa fa-sign-in"></i>  Đăng xuất
                    </a>
                </li>
            <?php else: ?>
                <li id="user-box">
                    <a href="{{route('fe.login')}}" class="fa fa-user">  Đăng nhập</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>     
</div> 