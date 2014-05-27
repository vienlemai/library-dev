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

        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/select2.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/all.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/be/lht.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/be/vlm.css') }}}"/>
        <link media="all" rel="stylesheet" type="text/css" href="{{{ asset('css/addon.css') }}}"/>

        <!--[if lte IE 7]>
        <script type='text/javascript' src='js/other/lte-ie7.js'></script>
        <![endif]-->

    </head>
    <body>
        <div id="wrapper" class="screen_wide">
            @yield('content')
        </div>
        <script type="text/javascript">
            window.print();
        </script>
        
    </body>
</html>
