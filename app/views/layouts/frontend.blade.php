<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
        <title>Thư Viện</title>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/bootstrap-2.3.2.min.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/fe/bootstrap-override.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/font-awesome.min.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/fe/bootstrap-datepicker.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/select2.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/frontend.css') }}}"/>
    </head>
    <body>       
        <div id="wrap">
            <?php echo View::make('frontend.partials.main_menu'); ?>
            <div class="center_content">
                <div class='margin-5'>
                    @include('partials.flash')
                </div>
                @yield('content')
                <div class="clear"></div>
            </div><!--end of center content-->
            <div class="margin-15"></div>
            <div class="footer">
                <div class="left_footer">
                </div>
                <div class="right_footer">
                    <a href="#">Trang chủ</a>
                    <a href="#">Giới thiệu</a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{{asset('js/plugins/jquery-2.0.0.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/plugins/bootstrap-2.3.2.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/plugins/bootbox.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/plugins/bootstrap-datepicker.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/plugins/select2.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/fe/common.js')}}}"></script>
        @yield('inline_js')
    </body>
</html>