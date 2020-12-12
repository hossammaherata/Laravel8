<!doctype html>
<html lang="en">

<head>
<title>Dimax | Wait </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('cms/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/animate-css/vivify.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('cms/html/assets/css/site.min.css')}}">

</head>

<body class="theme-cyan font-montserrat light_version">

    <!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">

        <div class="card page-400">
            <div class="body">
                <p class="lead mb-3"><span class="number left"> </span><span class="text">الحساب متوقف    <br/></span></p>
                <div class="margin-top-30">
                    <a href="{{route('user.login.view')}}" class="btn btn-round btn-default btn-block"><i class="fa fa-arrow-left"></i> <span>لوحة تسجيل الدخول</span></a>
                    <a href="index.html" class="btn btn-round btn-primary btn-block"><i class="fa fa-home"></i> <span>الموقع</span></a>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<script src="{{asset('cms/html/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('cms/html/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('cms/html/assets/bundles/mainscripts.bundle.js')}}"></script>
</body>
</html>
