<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "> <!-- Custom stlylesheet -->
</head>

<body>
    <div id="header">
        <!-- HEADER -->
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <div class="logo">
                        <a href="#"><img src="{{ asset('images/library.png') }}"></a>
                    </div>
                </div>
                @auth
                    <div class="offset-md-2 col-md-2">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hi {{ auth()->user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('change_password') }}">Change Password</a>
                                <a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit()">Log Out</a>
                            </div>
                            <form method="post" id="logoutForm" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="offset-md-2 col-md-2">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="{{ route('admin.login') }}"  rel="">
                                Log in 
                            </a>
                        </div>
                    </div>
                @endguest


            </div>
        </div>
    </div> <!-- /HEADER -->
    @auth
        <div id="menubar">
            <!-- Menu Bar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="menu">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('authors') }}">Authors</a></li>
                            <li><a href="{{ route('publishers') }}">Publishers</a></li>
                            <li><a href="{{ route('categories') }}">Categories</a></li>
                            <li><a href="{{ route('books') }}">Books</a></li>
                            <li><a href="{{ route('students') }}">Reg Students</a></li>
                            <li><a href="{{ route('book_issued') }}">Book Issue</a></li>
                            <li><a href="{{ route('reports') }}">Reports</a></li>
                            <li><a href="{{ route('settings') }}">Settings</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- /Menu Bar -->
    @endauth
    @yield('content')

    <!-- FOOTER -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /FOOTER -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
