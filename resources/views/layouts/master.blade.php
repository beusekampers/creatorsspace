<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Home')</title>

    <link rel="stylesheet" href="/css/app.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a href="{{ url('/') }}">
                        Creators Space
                    </a>
                </div>

                <div class="collapse navbar-collapse" style="width: 40%; float:right;" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown right">


                                <a class='dropdown-toggle dropdown-button' href='#' data-activates='dropdown2'>
                                    <i class="material-icons">expand_more</i>
                                    <div class="avatar">
                                        <img src="/uploads/avatars/{{ Auth::user()->profile_picture }}" alt="Profile" />
                                    </div>
                                </a>

                                <ul id='dropdown2' style="margin-top: 65px;" class='dropdown-content'>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('/profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('posts/create') }}">
                                            Upload
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Main content --}}
        <div id="container" class="container content">
            @yield('content')
        </div>
        {{-- Detail page content --}}
        @yield('detail-page')
        @guest
        @else
        <div class="upload-btn">
            <a href="{{ url('posts/create') }}" class="btn-floating btn-large waves-effect waves-light">
                <i class="material-icons">add</i>
            </a>
        </div>
        @endguest
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Creators Space</h5>
                        <p class="grey-text text-lighten-4">Share your creativity.</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2017 Copyright
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
        <script src="/js/app.js"></script>

    </body>
</html>