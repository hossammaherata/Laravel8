<!doctype html>
<html lang="en">

<head>
    <title>Dimax | @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
{{-- <link rel="stylesheet" href="{{asset('cms/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('cms/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/multi-select/css/multi-select.css')}}">
{{-- <link rel="stylesheet" href="{{asset('cms/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"> --}}
{{-- <link rel="stylesheet" href="{{asset('cms/assets/vendor/nouislider/nouislider.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('cms/assets/vendor/morrisjs/morris.css')}}" />
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/animate-css/vivify.min.css') }}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/light-gallery/css/lightgallery.css')}}">

<link rel="stylesheet" href="{{asset('cms/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/sweetalert/sweetalert.css')}}"/>


    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/c3/c3.min.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('cms/html/assets/css/site.min.css') }}">

    <style>
         .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
    </style>
@yield('style')


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

    <!-- Theme Setting -->
    {{-- <div class="themesetting">
        <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>
        <div class="card theme_color">
            <div class="header">
                <h2>Theme Color</h2>
            </div>
            <ul class="choose-skin list-unstyled mb-0">
                <li data-theme="green">
                    <div class="green"></div>
                </li>
                <li data-theme="orange">
                    <div class="orange"></div>
                </li>
                <li data-theme="blush">
                    <div class="blush"></div>
                </li>
                <li data-theme="cyan" class="active">
                    <div class="cyan"></div>
                </li>
                <li data-theme="indigo">
                    <div class="indigo"></div>
                </li>
                <li data-theme="red">
                    <div class="red"></div>
                </li>
            </ul>
        </div>
        <div class="card font_setting">
            <div class="header">
                <h2>Font Settings</h2>
            </div>
            <div>
                <div class="fancy-radio mb-2">
                    <label><input name="font" value="font-krub" type="radio"><span><i></i>Krub Google
                            font</span></label>
                </div>
                <div class="fancy-radio mb-2">
                    <label><input name="font" value="font-montserrat" type="radio" checked><span><i></i>Montserrat
                            Google font</span></label>
                </div>
                <div class="fancy-radio">
                    <label><input name="font" value="font-roboto" type="radio"><span><i></i>Robot Google
                            font</span></label>
                </div>
            </div>
        </div>
        <div class="card setting_switch">
            <div class="header">
                <h2>Settings</h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    Light Version
                    <div class="float-right">
                        <label class="switch">
                            <input type="checkbox" class="lv-btn" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    RTL Version
                    <div class="float-right">
                        <label class="switch">
                            <input type="checkbox" class="rtl-btn">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    Horizontal Henu
                    <div class="float-right">
                        <label class="switch">
                            <input type="checkbox" class="hmenu-btn">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    Mini Sidebar
                    <div class="float-right">
                        <label class="switch">
                            <input type="checkbox" class="mini-sidebar-btn">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="form-group">
                <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>
                <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77"
                        aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="d-block">Server Load <span class="float-right">50%</span></label>
                <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        <nav class="navbar top-navbar">
            <div class="container-fluid">

                <div class="navbar-left">
                    <div class="navbar-btn">
                        <a href="index.html"><img src="{{ asset('cms/assets/images/icon.svg') }}" alt="Oculux Logo"
                                class="img-fluid logo"></a>
                        <button type="button" class="btn-toggle-offcanvas"><i
                                class="lnr lnr-menu fa fa-bars"></i></button>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-envelope"></i>
                                <span class="notification-dot bg-green">4</span>
                            </a>
                            <ul class="dropdown-menu right_chat email vivify fadeIn">
                                <li class="header green">You have 4 New eMail</li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                            <div class="media-body">
                                                <span class="name">James Wert <small class="float-right text-muted">Just
                                                        now</small></span>
                                                <span class="message">Update GitHub</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                            <div class="media-body">
                                                <span class="name">Folisise Chosielie <small
                                                        class="float-right text-muted">12min ago</small></span>
                                                <span class="message">New Messages</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object "
                                                src="{{ asset('cms/assets/images/xs/avatar5.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Louis Henry <small
                                                        class="float-right text-muted">38min ago</small></span>
                                                <span class="message">Design bug fix</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                <a href="#">
                                        <div class="media mb-0">
                                            <img class="media-object "
                                                src="{{ asset('cms/assets/images/xs/avatar2.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Debra Stewart <small
                                                        class="float-right text-muted">2hr ago</small></span>
                                                <span class="message">Fix Bug</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" onclick="dd()" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                @if(Auth::user()->unreadNotifications()->count()>0)

                                <span id="countnot" class="notification-dot bg-azura">{{Auth::user()->unreadNotifications()->count()}}</span>
                                   @endif
                            </a>
                            <ul class="dropdown-menu feeds_widget vivify fadeIn">
                                @if(Auth::user()->unreadNotifications()->count()>0)
                                <li class="header blue">لديك إشعارات جديدة</li>
                                @endif

                                @foreach (Auth::user()->Notifications as $item)

                                   <li>
                                   <a href="{{route('user.message')}}">
                                        <div class="feeds-left bg-red"><i class="fa fa-check"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-danger">{{$item->data['title']}} <small
                                                    class="float-right text-muted">{{$item->created_at->diffForHumans()}}</small></h4>
                                            <small>رسالة</small>
                                        </div>
                                    </a>
                                </li>
                                @endforeach


                            </ul>
                        </li>



                    </ul>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i
                                        class="icon-magnifier"></i></a></li>
                                        <li><a href="{{route('user.profile.view')}}" class=" icon-menu" title="Right Menu"><i
                                        class="icon-user"></i></a>
                            </li>


                            <li><a href="{{route('user.logout')}}" class="icon-menu"><i class="icon-power"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
        </nav>

        <div class="search_div">
            <div class="card">
                <div class="body">
                    <form id="navbar-search" class="navbar-form search-form">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i
                                        class="icon-close"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <span>Search Result <small class="float-right text-muted">About 90 results (0.47 seconds)</small></span>
            <div class="table-responsive">
                <table class="table table-hover table-custom spacing5">
                    <tbody>
                        <tr>
                            <td class="w40">
                                <span>01</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Avatar Name"><span>SS</span></div>
                                    <div class="ml-3">
                                        <a href="page-invoices-detail.html" title="">South Shyanne</a>
                                        <p class="mb-0">south.shyanne@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>02</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asseT('cms/assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip"
                                        data-placement="top" title="" alt="Avatar" class="w35 h35 rounded"
                                        data-original-title="Avatar Name">
                                    <div class="ml-3">
                                        <a href="javascript:void(0);" title="">Zoe Baker</a>
                                        <p class="mb-0">zoe.baker@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>03</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avtar-pic w35 bg-indigo" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Avatar Name"><span>CB</span></div>
                                    <div class="ml-3">
                                        <a href="javascript:void(0);" title="">Colin Brown</a>
                                        <p class="mb-0">colinbrown@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>04</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avtar-pic w35 bg-green" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Avatar Name"><span>KG</span></div>
                                    <div class="ml-3">
                                        <a href="javascript:void(0);" title="">Kevin Gill</a>
                                        <p class="mb-0">kevin.gill@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>05</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('cms/assets/images/xs/avatar5.jpg') }}" data-toggle="tooltip"
                                        data-placement="top" title="" alt="Avatar" class="w35 h35 rounded"
                                        data-original-title="Avatar Name">
                                    <div class="ml-3">
                                        <a href="javascript:void(0);" title="">Brandon Smith</a>
                                        <p class="mb-0">Maria.gill@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>06</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('cms/assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip"
                                        data-placement="top" title="" alt="Avatar" class="w35 h35 rounded"
                                        data-original-title="Avatar Name">
                                    <div class="ml-3">
                                        <a href="javascript:void(0);" title="">Kevin Baker</a>
                                        <p class="mb-0">kevin.baker@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>07</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('cms/assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip"
                                        data-placement="top" title="" alt="Avatar" class="w35 h35 rounded"
                                        data-original-title="Avatar Name">
                                    <div class="ml-3">
                                        <a href="javascript:void(0);" title="">Zoe Baker</a>
                                        <p class="mb-0">zoe.baker@example.com</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="megamenu" class="megamenu particles_js">
            <a href="javascript:void(0);" class="megamenu_toggle btn btn-danger"><i class="icon-close"></i></a>
            <div class="container">
                <div class="row clearfix">
                    <div class="col-12">
                        <ul class="q_links">
                            <li><a href="app-inbox.html"><i class="icon-envelope"></i><span>Inbox</span></a></li>
                            <li><a href="app-chat.html"><i class="icon-bubbles"></i><span>Messenger</span></a></li>
                            <li><a href="app-calendar.html"><i class="icon-calendar"></i><span>Event</span></a></li>
                            <li><a href="page-profile.html"><i class="icon-user"></i><span>Profile</span></a></li>
                            <li><a href="page-invoices.html"><i class="icon-printer"></i><span>Invoice</span></a></li>
                            <li><a href="page-timeline.html"><i class="icon-list"></i><span>Timeline</span></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card w_card3">
                            <div class="body">
                                <div class="text-center"><i class="icon-picture text-info"></i>
                                    <h4 class="m-t-25 mb-0">104 Picture</h4>
                                    <p>Your gallery download complete</p>
                                    <a href="javascript:void(0);" class="btn btn-info btn-round">Download now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card w_card3">
                            <div class="body">
                                <div class="text-center"><i class="icon-diamond text-success"></i>
                                    <h4 class="m-t-25 mb-0">813 Point</h4>
                                    <p>You are doing great job!</p>
                                    <a href="javascript:void(0);" class="btn btn-success btn-round">Read now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card w_card3">
                            <div class="body">
                                <div class="text-center"><i class="icon-social-twitter text-primary"></i>
                                    <h4 class="m-t-25 mb-0">3,756</h4>
                                    <p>New Followers on Twitter</p>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-round">Find more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Anyone send me a message
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" checked="">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Anyone seeing my profile page
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" checked="">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Anyone posts a comment on my post
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="particles-js"></div>
        </div>

        {{-- <div id="rightbar" class="rightbar">
            <div class="body">
                <ul class="nav nav-tabs2">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Chat-one">Chat</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-list">List</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-groups">Groups</a></li>
                </ul>
                <hr>

            </div>
        </div> --}}

        <div id="left-sidebar" class="sidebar">
            <div class="navbar-brand">
                <a href="index.html"><img src="{{ asset('cms/assets/images/icon.svg') }}" alt="Oculux Logo"
                        class="img-fluid logo"><span>DiMax</span></a>
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i
                        class="lnr lnr-menu icon-close"></i></button>
            </div>
            <div class="sidebar-scroll">
                <div class="user-account">
                    <div class="user_div">
                        <a href="{{route('user.profile.view')}}">
                              <img src="{{ url('images/users/' . Auth::user()->image) }}" class="user-photo"
                            alt="User Profile Picture">
                        </a>


                    </div>

                </div>
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="header">Main</li>
                        <li>
                        <a href="{{route('user.dashbord')}}" class="has-arrow"><i class="icon-home"></i><span>الصفحة الرئيسية</span></a>

                        </li>


                         <li>
                            <a href="#"  data-toggle="modal" data-target="#allbill" class="has-arrow"><i class="icon-badge"></i><span>التقويم</span></a>

                        </li>



                        <li>
                            <a href="{{route('user.twit')}}" class="has-arrow"><i class="icon-pencil"></i><span>المنتجات</span></a>

                        </li>
                        <li>
                        <a href="{{route('alleve.user')}}" class="has-arrow"><i class="icon-diamond"></i><span>المسابقات</span></a>

                        </li>


                        <li class="header">التواصل</li>


                    <li><a href="{{route('user.contact')}}"><i class="icon-grid"></i><span>تواصل معنا</span></a></li>




                        <li><a href="{{route('user.message')}}"><i class="icon-envelope"></i><span>الرسائل</span></a>
                        </li>
                        <li><a href="{{route('user.logout')}}"><i class="icon-power"></i><span>تسجيل خروج</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="allbill" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">الفواتير</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addform" action="{{ route('auth.bills') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-size: 20px">من</label>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                                <input name="from" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-size: 20px">إلى</label>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                                <input name="to" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="add" class=" btn btn-primary">ذهاب</button>
                        <button type="button" class="btn btn-danger " data-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>

        @yield('content')
            @include('sweetalert::alert')


    </div>

    <!-- Javascript -->
    <script src="{{ asset('cms/html/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('cms/html/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('cms/html/assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/dropify/js/dropify.min.js') }}"></script>

    <script src="{{ asset('cms/html/assets/js/pages/forms/dropify.js') }}"></script>


    <script src="{{ asset('cms/html/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src=" {{ asset('cms/html/assets/js/index.js') }}"></script>
    {{-- _________Filter___________ --}}

     {{-- <script src="{{asset('cms/html/assets/bundles/datatablescripts.bundle.js')}}"></script> --}}
<script src="{{asset('cms/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/sweetalert/sweetalert.min.js')}}"></script><!-- SweetAlert Plugin Js -->
<script src="{{asset('cms/html/assets/js/pages/tables/jquery-datatable.js')}}"></script>
{{-- ___________________________ --}}
<script src="{{asset('cms/html/assets/bundles/knob.bundle.js')}}"></script><!-- Jquery Knob-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function dd(){

   axios.get('/auth/noti')
                .then(function (response) {
                              $('#countnot').hide();
                    console.log(10);


                })
                .catch(function (error) {
                    // handle error (Status Code: 400)
                    console.log(error);
                    console.log(error.response.data);
                    showMessage(error.response.data);
                })
                .then(function () {
                    // always executed
                });
    }
</script>
{{-- multi --}}

<script src="{{asset('cms/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script><!-- Bootstrap Colorpicker Js -->
<script src="{{asset('cms/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script><!-- Input Mask Plugin Js -->
<script src="{{asset('cms/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('cms/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('cms/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('cms/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{asset('cms/assets/vendor/nouislider/nouislider.js')}}"></script><!-- noUISlider Plugin Js -->
<script src="{{asset('cms/html/assets/js/pages/forms/advanced-form-elements.js')}}"></script>
    @yield('script')
</body>

</html>
