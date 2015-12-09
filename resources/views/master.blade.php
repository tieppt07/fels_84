<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Framgia E-Learning System - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon(copy).png') }}"/>    
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.11.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">E-learning</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @if ($currentUser)
                        <li><a href="{{ url('words') }}">Word List</a></li>
                        <li><a href="{{ url('categories') }}">Category</a></li>
                        <li><a href="#">Lesson</a></li>
                    @endif
                        <li><a href="{{ url('faq') }}">FAQ</a></li>
                        <li><a href="{{ url('about') }}">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (!$currentUser)
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $currentUser->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('users/'.$currentUser->id) }}">Profile</a></li>
                                @if ($currentUser->isAdmin())
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ url('admin') }}">Admin Panel</a></li>
                                @endif
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        @yield('content')
    </div>
    
</body>
</html>
