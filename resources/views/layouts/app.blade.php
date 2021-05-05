<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]>
<html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>
<html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>
<html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nam Trường</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
          type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('fonts/font-icon.css')}}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('custom-slider/css/nivo-slider.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('custom-slider/css/preview.css')}}" type="text/css" media="screen"/>

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />

    @if(session('notify'))
        <script>
            var TYPE_MESSAGE = "{{session('notify.type')}}";
            var MESSAGE = "{{session('notify.message')}}";
        </script>
        @endif
</head>
<body class="home-one">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- header area start -->
@include('components.header')
<!-- header area end -->
<!-- start home slider -->
@yield('content')
<!-- Brand Logo Area End -->
<!-- FOOTER START -->
@include('components.footer')
<!-- FOOTER END -->

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script src="{{asset('js/vendor/jquery-1.11.3.min.js')}}"></script>

<!-- bootstrap js
============================================ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Nivo slider js
============================================ -->
<script src="{{asset('custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{asset('custom-slider/home.js')}}" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>

<!-- price-slider js
============================================ -->
<script src="{{asset('js/price-slider.js')}}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{asset('js/jquery.bxslider.min.js')}}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{asset('js/jquery.meanmenu.js')}}"></script>

<!-- wow js
============================================ -->
<script src="{{asset('js/wow.js')}}"></script>

<!-- plugins js
============================================ -->
<script src="{{asset('js/plugins.js')}}"></script>

<!-- main js
============================================ -->
<script src="{{asset('js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
    if (typeof TYPE_MESSAGE != "undefined")
    {
        switch (TYPE_MESSAGE) {
            case 'success':
                $.notify(MESSAGE, TYPE_MESSAGE);
                break;
            case 'error':
                $.notify(MESSAGE, TYPE_MESSAGE);
                break;
            case 'warn':
                $.notify(MESSAGE, TYPE_MESSAGE);
                break;
        }
    }
    $(".js-show-login").click(function (event) {
        event.preventDefault();
        $.notify("Bạn phải đăng nhập để thực hiện chức năng này!", "warn");
        return false;
    })
</script>
@yield('script')
</body>
</html>
