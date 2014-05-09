<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
        <title>Book Store</title>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/bootstrap-2.3.2.min.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/fe/bootstrap-override.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/font-awesome.min.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/frontend.css') }}}"/>
    </head>
    <body>
        <div id="wrap">
            <div class="header">
                <div id="menu">
                    <ul>           
                        <!-- Selected-->
                        <li class="">
                            <a href="<?php echo route('fe.home')?>"><i class="fa fa-home"></i>  Trang chủ</a>
                        </li>
                        <li><a href="#"><i class="fa fa-bullhorn"></i> Thông báo</a></li>
                        <li><a href="<?php echo route('fe.search')?>"><i class="fa fa-search"></i> Tìm kiếm nâng cao</a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i>  Giỏ sách</a></li>
                        <li id="user-box"><a href="#modal-login" role="button" data-toggle="modal"><i class="fa fa-sign-in"></i>  Đăng nhập</a></li>
                        <!--<li id="user-box"><a href="#"><i class="fa fa-user"></i>  Trang cá nhân</a></li>-->
                    </ul>
                </div>     
            </div> 
            <div class="center_content">
                @yield('content')
                <div class="clear"></div>
            </div><!--end of center content-->
            <div class="footer">
                <div class="left_footer">
                </div>
                <div class="right_footer">
                    <a href="#">Trang chủ</a>
                    <a href="#">Giới thiệu</a>
                </div>
            </div>
        </div>
        <div id="modal-login" class="modal hide fade" role="dialog" aria-hidden="true">
            <form action="/" class="form-horizontal">
                <div class="modal-body">
                    <div class="contact_form">
                        <div class="form_subtitle">Đăng nhập</div>

                        <form name="register" action="#">     
                            <div class="form_row form-messages text-center">
                                <!--Email hoặc mật khẩu không đúng!-->
                            </div>
                            <div class="form_row">
                                <label class="contact"><strong>Email</strong></label>
                                <input type="text" class="contact_input" />
                            </div>
                            <div class="form_row">
                                <label class="contact"><strong>Mật khẩu</strong></label>
                                <input type="text" class="contact_input" />
                            </div> 
                            <div class="form_row text-center">
                                <a href="#">Quên mật khẩu?</a>  
                                <!--<button class="btn btn-small" data-dismiss="modal" aria-hidden="true">Thoát</button>-->
                                <button href="#" class="btn btn-small btn-brow">Đăng nhập</button>
                            </div>
                        </form>     
                    </div>  
                </div>

            </form>
        </div>
        <script type="text/javascript" src="{{{asset('js/plugins/jquery-2.0.0.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/plugins/bootstrap-2.3.2.min.js')}}}"></script>
    </body>
</html>