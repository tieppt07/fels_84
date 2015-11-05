<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Framgia E-Learning System - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style-cos.css') }}">
    <script src="{{ asset('js/jquery-1.11.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-inverse navbar-fixed-top">
            <ul class="nav navbar-nav navbar-right">
                <li id="fat-menu" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-user"></i> 
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Change password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}">Log out</a></li>
                    </ul>
                </li>
            </ul>
            <a class="navbar-brand" href="">
                <span class="first">Framgia </span>
                <span class="second">E-learning</span>
            </a>
        </div>
    </div> <!-- /end-navbar -->

    @include('admin.sidebar')
    
    <div class="content">
        <div class="header">
            <h1 class="page-title">@yield('page-header')</h1>
        </div>
        <div class="container-fluid">
            @yield('content')
            @include('admin.footer')
        </div>
    </div> <!-- /end-content -->
</body>
</html>
