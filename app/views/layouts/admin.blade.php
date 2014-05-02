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
                    <a class='logo' href='{{route('home')}}'>
                        Thư viện online | Quản trị
                    </a>
                    <div class='buttons fl'>
                        <div class='item'>
                            <a class='btn btn-primary btn-small c_layout' href='#' title='Ẩn/Hiện Sidebar'>
                                <span class='i-layout-8'></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="layout">
                @include('partials.admin.sidebar')
                <div id="content">
                    @yield('content')
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{{asset('js/all.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/jquery.iframe-transport.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/jquery.fileupload.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/bootbox.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/jquery.validate.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/tinymce/tinymce.min.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/actions.js')}}}"></script>        
        <script type="text/javascript" src="{{{asset('js/select2.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/app.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/be/common.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/be/vlm.js')}}}"></script>
        <script type="text/javascript" src="{{{asset('js/be/lht.js')}}}"></script>
    </body>
</html>
