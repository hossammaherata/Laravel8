<!doctype html>
<html lang="en">

<head>
<title>Dimax</title>
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
{{-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div> --}}

<div class="auth-main2 particles_js">
    <div class="auth_div vivify fadeInTop">
        <div class="card">
            <div class="body">
                <div class="login-img">
                <img class="img-fluid" width="400px" height="400px" src="{{url('images/images/' . $image->imagelogin) }}" />
                </div>
                <form class="form-auth-small" method="POST" action="{{route('user.login.store')}}">
                    @csrf
                    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                    <div class="mb-3">
                        <p class="lead">DiMax Login</p>
                    </div>
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">الإيميل</label>
                        <input type="email" name="email" class="form-control round" id="signin-email"  placeholder="الإيميل">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">كلمة السر</label>
                        <input type="password" name="password" class="form-control round" id="signin-password"  placeholder="كلمة السر">
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block">دخول</button>
                    <div class="mt-4">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{route('user.forgot')}}">نسيت كلمة السر?</a></span>
                        <span>يتم إنشاء حسابات المستخدمين من قِبل مسؤول الموقع</span>
                        <br>
                    <span>تواصل مع الأرقام المرفقة في الموقع</span>

                    </div>
                </form>
                 <p class="mb-1">

      </p>

                <div class="pattern">
                    <span class="red"></span>
                    <span class="indigo"></span>
                    <span class="blue"></span>
                    <span class="green"></span>
                    <span class="orange"></span>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    {{-- <a href="">I forgot my password</a> --}}
<script src="{{asseT('cms/html/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('cms/html/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('cms/html/assets/bundles/mainscripts.bundle.js')}}"></script>
</body>
</html>
