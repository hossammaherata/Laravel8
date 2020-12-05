<!doctype html>

<html lang="en">

<head>
    <title>DiMax @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="DiMax">
    <meta name="keywords" content="DiMax">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    {{--
    <link rel="stylesheet"
        href="{{ asset('cms/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    --}}
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/multi-select/css/multi-select.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    --}}
    {{--
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/nouislider/nouislider.min.css') }}">
    --}}

    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/animate-css/vivify.min.css') }}">

    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/sweetalert/sweetalert.css') }}" />


    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/c3/c3.min.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('cms/html/assets/css/site.min.css') }}">

    <style>
        .demo-card label {
            display: block;
            position: relative;
        }

        .demo-card .col-lg-4 {
            margin-bottom: 30px;
        }

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
    <div class="themesetting">
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
    </div>

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
                                    <a href="javascript:void(0);">
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
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="notification-dot bg-azura">4</span>
                            </a>
                            <ul class="dropdown-menu feeds_widget vivify fadeIn">
                                <li class="header blue">You have 4 New Notifications</li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left bg-red"><i class="fa fa-check"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-danger">Issue Fixed <small
                                                    class="float-right text-muted">9:10 AM</small></h4>
                                            <small>WE have fix all Design bug with Responsive</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left bg-info"><i class="fa fa-user"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-info">New User <small
                                                    class="float-right text-muted">9:15 AM</small></h4>
                                            <small>I feel great! Thanks team</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left bg-orange"><i class="fa fa-question-circle"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-warning">Server Warning <small
                                                    class="float-right text-muted">9:17 AM</small></h4>
                                            <small>Your connection is not private</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left bg-green"><i class="fa fa-thumbs-o-up"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-success">2 New Feedback <small
                                                    class="float-right text-muted">9:22 AM</small></h4>
                                            <small>It will give a smart finishing to your site</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown language-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="fa fa-language"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item pt-2 pb-2" href="#"><img
                                        src="{{ asset('cms/assets/images/flag/us.svg') }} "
                                        class="w20 mr-2 rounded-circle"> US English</a>
                                <a class="dropdown-item pt-2 pb-2" href="#"><img
                                        src="{{ asset('cms/assets/images/flag/gb.svg') }} "
                                        class="w20 mr-2 rounded-circle"> UK English</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item pt-2 pb-2" href="#"><img
                                        src="{{ asset('cms/assets/images/flag/russia.svg') }} "
                                        class="w20 mr-2 rounded-circle"> Russian</a>
                                <a class="dropdown-item pt-2 pb-2" href="#"><img
                                        src="{{ asset('cms/assets/images/flag/arabia.svg') }} "
                                        class="w20 mr-2 rounded-circle"> Arabic</a>
                                <a class="dropdown-item pt-2 pb-2" href="#"><img
                                        src="{{ asset('cms/assets/images/flag/france.svg') }} "
                                        class="w20 mr-2 rounded-circle"> French</a>
                            </div>
                        </li>
                        <li><a href="javascript:void(0);" class="megamenu_toggle icon-menu" title="Mega Menu">Mega</a>
                        </li>
                        <li class="p_social"><a href="page-social.html" class="social icon-menu" title="News">Social</a>
                        </li>
                        <li class="p_news"><a href="page-news.html" class="news icon-menu" title="News">News</a></li>
                        <li class="p_blog"><a href="page-blog.html" class="blog icon-menu" title="Blog">Blog</a></li>
                    </ul>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i
                                        class="icon-magnifier"></i></a></li>
                            <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i
                                        class="icon-bubbles"></i><span class="notification-dot bg-pink">2</span></a>
                            </li>

                            <li><a href="#" class="icon-menu"><i class="icon-power"></i></a></li>

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

        <div id="rightbar" class="rightbar">
            <div class="body">
                <ul class="nav nav-tabs2">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Chat-one">Chat</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-list">List</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-groups">Groups</a></li>
                </ul>
                <hr>
                <div class="tab-content">
                    <div class="tab-pane vivify fadeIn delay-100 active" id="Chat-one">
                        <div class="chat_detail">
                            <ul class="chat-widget clearfix">
                                <li class="left float-left">
                                    <div class="avtar-pic w35 bg-pink"><span>KG</span></div>
                                    <div class="chat-info">
                                        <span class="message">Hello, John<br>What is the update on Project X?</span>
                                    </div>
                                </li>
                                <li class="right">
                                    <img src="{{ asset('cms/assets/images/xs/avatar1.jpg') }}" class="rounded" alt="">
                                    <div class="chat-info">
                                        <span class="message">Hi, Alizee<br> It is almost completed. I will send you an
                                            email later today.</span>
                                    </div>
                                </li>
                                <li class="left float-left">
                                    <div class="avtar-pic w35 bg-pink"><span>KG</span></div>
                                    <div class="chat-info">
                                        <span class="message">That's great. Will catch you in evening.</span>
                                    </div>
                                </li>
                                <li class="right">
                                    <img src="../assets/images/xs/avatar1.jpg" class="rounded" alt="">
                                    <div class="chat-info">
                                        <span class="message">Sure we'will have a blast today.</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <a href="javascript:void(0);" class=""><i
                                                class="icon-camera text-warning"></i></a>
                                    </span>
                                </div>
                                <textarea type="text" row="" class="form-control"
                                    placeholder="Enter text here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane vvivify fadeIn delay-100" id="Chat-list">
                        <ul class="right_chat list-unstyled mb-0">
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">Folisise Chosielie</span>
                                            <span class="message">offline</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{ asset('cms/assets/images/xs/avatar3.jpg') }}"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">Marshall Nichols</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">Louis Henry</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-orange"><span>DS</span></div>
                                        <div class="media-body">
                                            <span class="name">Debra Stewart</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-green"><span>SW</span></div>
                                        <div class="media-body">
                                            <span class="name">Lisa Garett</span>
                                            <span class="message">offline since May 12</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{ asset('cms/assets/images/xs/avatar5.jpg') }}"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">Debra Stewart</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{ asset('cms/assets/images/xs/avatar2.jpg') }}"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">Lisa Garett</span>
                                            <span class="message">offline since Jan 18</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">Louis Henry</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-pink"><span>DS</span></div>
                                        <div class="media-body">
                                            <span class="name">Debra Stewart</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-info"><span>SW</span></div>
                                        <div class="media-body">
                                            <span class="name">Lisa Garett</span>
                                            <span class="message">offline since May 12</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane vivify fadeIn delay-100" id="Chat-groups">
                        <ul class="right_chat list-unstyled mb-0">
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-cyan"><span>DT</span></div>
                                        <div class="media-body">
                                            <span class="name">Designer Team</span>
                                            <span class="message">offline</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-azura"><span>SG</span></div>
                                        <div class="media-body">
                                            <span class="name">Sale Groups</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-orange"><span>NF</span></div>
                                        <div class="media-body">
                                            <span class="name">New Fresher</span>
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-indigo"><span>PL</span></div>
                                        <div class="media-body">
                                            <span class="name">Project Lead</span>
                                            <span class="message">offline since May 12</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="left-sidebar" class="sidebar">
            <div class="navbar-brand">
                <a href="index.html"><img src="{{ asset('cms/assets/images/icon.svg') }}" alt="DiMax Logo"
                        class="img-fluid logo"><span>DiMax</span></a>
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i
                        class="lnr lnr-menu icon-close"></i></button>
            </div>
            <div class="sidebar-scroll">
                <div class="user-account">
                    <div class="user_div">

                        {{-- <img src="{{ url('images/admins/' . Auth::user()->image) }}"
                            class="user-photo" alt="User Profile Picture"> --}}
                        <img src="#" class="user-photo" alt="User Profile Picture">




                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle user-name"
                            data-toggle="dropdown"><strong>hossam</strong></a>
                        <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                            <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                            <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                            <li class="divider"></li>



                            <li><a href="#"><i class="icon-power"></i>Logout</a></li>

                        </ul>
                    </div>
                </div>
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="header">الرئيسة</li>
                        <li>
                            <a href="{{ route('admin.dashbord') }}" class="has-arrow"><i
                                    class="icon-home"></i><span>الصفحة الرئيسية</span></a>

                        </li>


                        <li>
                            <a href="#myPage" class="has-arrow"><i class="icon-badge"></i><span>المسوقين</span></a>
                            <ul>
                                <li class="active"><a href="{{ route('user.index') }}">جيمع المسوقين</a></li>
                                <li><a href="{{ route('user.create') }}">مسوق جديد</a></li>

                            </ul>
                        </li>



                        <li>
                            <a href="#myPage" class="has-arrow"><i class="icon-pencil"></i><span>الفواتير</span></a>
                            <ul>
                                <li class="active"><a href="{{ route('bill.index') }}">كافة الفواتير</a></li>
                                <li><a href="{{ route('bill.create') }}">فاتورة جديدة </a></li>
                                {{-- <li><a href="#" data-toggle="modal"
                                        data-target="#createcate">كافة الفواتير</a></li>
                                --}}


                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#allbill" class="has-arrow"><i
                                    class="icon-diamond"></i><span>كشف الفواتير</span></a>

                        </li>
                        <li>
                            <a href="#myPage" class="has-arrow"><i class="icon-book-open"></i><span>الدفعات</span></a>
                            <ul>
                                <li class="active"><a data-toggle="modal" data-target="#reportpaid" href="#">الدفعات
                                        المالية</a></li>
                                <li><a href="{{ route('paid.index') }}">الدفعات المستلمة</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#addpaids">إضافة دفعة</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#myPage" class="has-arrow"><i
                                    class="icon-social-twitter"></i><span>القنوات</span></a>
                            <ul>
                                <li class="active"><a href="{{ route('twit.index') }}">جميع القنوات
                                    </a></li>
                                <li><a href="{{ route('twit.create') }}"> قناة جديدة</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#myPage" class="has-arrow"><i class="icon-map"></i><span>التجار</span></a>
                            <ul>
                                <li class="active"><a href="{{ route('deal.index') }}">جميع التجار
                                    </a></li>
                                <li><a href="{{ route('deal.create') }}"> تاجر جديد</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#myPage" class="has-arrow"><i class="icon-star"></i><span>المسابقات</span></a>
                            <ul>
                                <li class="active"><a href="{{ route('event.index') }}">جميع المسابقات
                                    </a></li>
                                <li><a data-toggle="modal" data-target=".new-project-modal" href="#">مسابقة جديدة</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#profitdeal" class="has-arrow"><i
                                    class="fa fa-dollar"></i><span>الأرباح</span></a>

                        </li>
                        <li class="header">___</li>


                        <li><a href="{{ route('truch.index') }}"><i class=" fa fa-trash"></i><span>المحذوفات</span></a>
                        </li>
                        <li class="header">UI Elements</li>

                        <li><a href="map-jvectormap.html"><i class="icon-map"></i><span>jVector Map</span></a></li>
                        <li class="header">Extra</li>


                        <li><a href="../documentation/index.html"><i class="icon-doc"></i><span>Documentation</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Setup New Project -->
        <div class="modal fade new-project-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">مسابقة جديدة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="desc" placeholder="وصف المسابقة">
                            </div>
                            <input type="file" name="image" class="dropify">
                            <div class="form-group">
                                <label for="exampleInputPassword1" style="font-size: 20px">تاريخ الإنتهاء</label>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                        <input name="end" type="text" data-provide="datepicker"
                                            data-date-autoclose="true" class="form-control" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 20px">الحالة </label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status"
                                        @if (old('status') == 'on')
                                    checked @endif>
                                    <label class="custom-control-label" style="font-size: 20px"
                                        for="status">مُفعل</label>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-round btn-default" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-round btn-success">إنشاء</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- //////////////// --}}

        @yield('content')

    </div>
    @include('sweetalert::alert')

    <div id="createcust" class="modal fade" role="dialog">
        <div class="modal-dialog">



        </div>
    </div>
    <div id="paidmodal"></div>
    <!-- Javascript -->
    <script src="{{ asset('cms/html/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('cms/html/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('cms/html/assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('cms/assets/js/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('cms/html/assets/js/pages/forms/dropify.js') }}"></script>


    <script src="{{ asset('cms/html/assets/js/jquery.printPage.js') }}"></script>



    <script src="{{ asset('cms/html/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src=" {{ asset('cms/html/assets/js/index.js') }}"></script>
    {{-- _________Filter___________ --}}

    {{-- للبحث والباجينيت
    <script src="{{ asset('cms/html/assets/bundles/datatablescripts.bundle.js') }}"></script>
    --}}

    <script src="{{ asset('cms/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/sweetalert/sweetalert.min.js') }}"></script><!-- SweetAlert Plugin Js -->
    <script src="{{ asset('cms/html/assets/js/pages/tables/jquery-datatable.js') }}"></script>
    {{-- ___________________________ --}}

    {{-- multi --}}

    <script src="{{ asset('cms/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('cms/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <!-- Input Mask Plugin Js -->
    <script src="{{ asset('cms/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <!-- Multi Select Plugin Js -->
    <script src="{{ asset('cms/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('cms/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('cms/assets/vendor/nouislider/nouislider.js') }}"></script><!-- noUISlider Plugin Js -->
    <script src="{{ asset('cms/html/assets/js/pages/forms/advanced-form-elements.js') }}"></script>
    <input type="hidden" name="" id="paidtoken" value="{{ csrf_token() }}">

    <div id="addpaids" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">إضافة دفعة</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addform" action="{{ route('paid.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size: 20px">بداية الكشف</label>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <input name="from" type="text" data-provide="datepicker" data-date-autoclose="true"
                                        class="form-control" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size: 20px">نهاية الكشف</label>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <input name="to" type="text" data-provide="datepicker" data-date-autoclose="true"
                                        class="form-control" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="dd">
                            <label style="font-size: 20px">المبلغ</label>
                            <input type="number" class="form-control" style="font-size: 20px" name="value"
                                placeholder=" ادخل  المبلغ ">
                        </div>

                        <div class="form-group" id="dd">
                            <label style="font-size: 20px">ملاححظة</label>
                            <input type="text" class="form-control hosam" value="{{ old('name') }}"
                                style="font-size: 20px" name="note" placeholder=" ملاحظة ">
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
    <script>
        $(".paid").click(function() {
            //   location.reload();
            var id = $(this).data('id');
            $.get('/cms/paid/get/user/' + id).done(function(item) {
                $('#paidmodal').replaceWith(item);
                $('#paidmodal').modal("show");
            });
        });

    </script>
    @yield('script')
</body>
{{-- all Bills --}}
<div id="allbill" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">الفواتير</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addform" action="{{ route('view.bill.index') }}" method="POST">
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

<div id="reportpaid" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">كشف دفعات</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paid.users') }}" method="POST">
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



<div id="profitdeal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">كشف ربح</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.profit') }}" method="POST">
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

</html>
