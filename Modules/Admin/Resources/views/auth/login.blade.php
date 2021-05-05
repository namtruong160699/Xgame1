<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Đăng nhập</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="{{asset('theme_admin/plugins/fontawesome-free/css/all.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
    <style>
        body {
            font-size: 15px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background: #0B87C9;
            color: #393939;
            line-height: 1.5;
        }

        body, h1, h2, h3, h4, div, p, span {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        h1, h2, h3, h4 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        a {
            color: #fff;
        }

        a:active, a:hover {
            text-decoration: underline;
            color: #fff;
            outline: none;
        }

        #password-sent div.alert {
            border-radius: 0;
        }

        .login-container .login-frame {
            background: #fff;
            padding-bottom: 20px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .login-container .login-frame .validation-summary-errors {
            color: #D19D59 !important;
        }

        .login-container .login-frame h3.heading {
            font-size: 23px;
            color: #478FCA !important;
            margin-bottom: 15px;
        }

        .login-container .login-frame h3.heading .fa.fa-lock {
            padding-right: 8px;
        }

        .login-container .login-frame .login-form .form-group.input-icon {
            position: relative;
        }

        .login-container .login-frame .login-form .form-group.input-icon i.fa.icon-right {
            position: absolute;
            left: auto;
            right: 7px;
            top: 9px;
            color: #909090;
            font-size: 16px;
        }

        .login-container .login-frame .login-form .form-group .checkbox {
            padding: 0;
            margin-top: 0;
        }

        .login-container .login-frame .login-form .btn-primary {
            background-color: #428BCA !important;
            border-color: #428BCA;
        }

        .login-container .login-frame .login-form .btn-primary:hover {
            background-color: #1B6AAA !important;
            border-color: #428BCA;
        }

        .login-container .login-frame .login-form .btn {
            border-radius: 3px !important;
        }

        .login-container .login-frame .login-form .btn i.fa.fa-key {
            margin-right: 5px;
        }

        .login-container .login-frame .login-form .btn-sm {
            border-width: 4px;
            font-size: 15px;
            padding: 4px 9px;
            line-height: 1.39;
            width: 50%;
            display: table;
            margin: 0 auto;
        }

        input[type="text"], input[type="password"] {
            border-radius: 3px !important;
            padding-left: 10px;
            box-shadow: none;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            box-shadow: none;
            color: #696969;
            border-color: #F59942;
            background-color: #FFF;
            outline: medium none;
        }

        .padd-0 {
            padding: 0;
        }

        /* Register */
        .panel-succcess {
            font-size: 14px;
        }

        .panel-succcess .panel-heading {
            background-color: #0B87C9 !important;
            border-color: #0B87C9 !important;
            color: #FFF !important;
        }

        .panel-succcess .panel-heading .panel-title {
            font-size: 18px;
        }

        .panel-succcess .hotline {
            color: #D53F40;
            font-size: 20px;
        }

        /*# sourceMappingURL=main.css.map */
    </style>
    @if(session('danger'))
        <script>
            var TYPE_MESSAGE = "{{session('danger.type')}}";
            var MESSAGE = "{{session('danger.message')}}";
        </script>
    @endif
</head>
<body>
<header id="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img src="{{asset('theme_admin/dist/img/logo-admin.png')}}"
                     class="img-responsive col-sm-12" style="padding: 50px;"/>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
<section class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="login-container col-md-4 col-md-offset-4" id="login-form">
                <div class="login-frame clearfix">
                    <h3 class="heading col-md-10 col-md-offset-1 padd-0"><i class="fa fa-lock"></i> Đăng nhập</h3>
                    <ul class="validation-summary-errors col-md-10 col-md-offset-1">
                    </ul>
                    <div class="col-md-10 col-md-offset-1">
                        <form class="form-horizontal login-form frm-sm" enctype="multipart/form-data" method="POST"
                              action="">
                            @csrf
                            <div class="form-group input-icon">
                                <label class="sr-only control-label">Email</label>
                                <input type="text" name="email"
                                       value=""
                                       class="form-control" placeholder="Email">
                                <i class="fa fa-user icon-right"></i>
                            </div>
                            <div class="form-group input-icon">
                                <label class="sr-only control-label">Password</label>
                                <input type="password" name="password" value=""
                                       class="form-control" placeholder="Mật khẩu">
                                <i class="fa fa-lock icon-right"></i>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="login" value="ĐĂNG NHẬP" class="btn btn-primary btn-sm"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $.notify(MESSAGE, TYPE_MESSAGE);
</script>
</body>
</html>
