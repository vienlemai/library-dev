<?php $currentMenu = Route::currentRouteName(); ?>
<div id='sidebar'>
    <div class='user'>
        <div class='pic'>
            <img src="{{asset('img/default_avatar.png')}}">
        </div>
        <div class='info'>
            <div class='name'
                 <a href='#'></a>
            </div>
            <div class='buttons'>
                <a href='<?php echo route('fe.home') ?>' target="_blank">
                    <span class='i-cog'></span>
                    Trang bạn đọc
                </a>
                <a class='fr' href='{{{ route('logout') }}}'>
                    <span class='i-forward'></span>
                    Đăng xuất
                </a>
            </div>
        </div>
    </div>
    <ul class='navigation'>
        <li class='<?php echo setActiveMenu($currentMenu, 'dashboard') ?>'>
            <a href='{{route('home')}}'>Bảng điều khiển</a>
        </li>
        <li class='<?php echo setActiveMenu($currentMenu, 'profile') ?>'>
            <a href='{{route('profile')}}'>Trang cá nhân</a>
        </li>
        <?php foreach ($modules as $p): ?>
            <li class='openable open'>
                <a href='#'><?php echo Permission::$ACTIONS[$p]['title'] ?></a>
                <ul>
                    <?php foreach (Permission::$ACTIONS[$p]['menus'] as $k => $v): ?>
                        <li class='<?php echo setActiveMenu($currentMenu, $k) ?>'>
                            <a href='{{route($k)}}'><?php echo $v ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>        
    </ul>
</div>