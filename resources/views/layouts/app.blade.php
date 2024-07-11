<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- start category --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categoryies
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('category.create')}}">Create</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('category.index')}}">All Categories</a></li>
                      </ul>
                    </li>
                </ul>
                {{-- end category --}}


                {{-- start post --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Posts
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('post.create')}}">Create</a></li>
                        <li><a class="dropdown-item" href="{{route('post.trashed')}}">Trashed</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route("post.index")}}">All posts</a></li>
                      </ul>
                    </li>
                </ul>
                {{-- end post --}}


                {{-- start tags --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tgas
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('tag.create')}}">Create</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('tags')}}">All Tgas</a></li>
                      </ul>
                    </li>
                </ul>
                {{-- end tags --}}
                {{-- @if(Auth::user()->admin) --}}
                {{-- start users --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('user.create')}}">Create</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('users')}}">All Users</a></li>
                      </ul>
                    </li>
                </ul>
                {{-- end users --}}

                {{-- start settings --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                      </a>
                      <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="{{route('settings.update')}}">Update Settings</a></li> --}}
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('settings')}}">settings</a></li>
                      </ul>
                    </li>
                </ul>
                {{-- end settings --}}

                {{-- @endif --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile' , Auth::user()->id) }}">
                                        Profile
                                     </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
     <!-- ckeditor -->
     <script src="/assets/js/ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector('#classic-editor') )
        .catch( error => {
            console.error( error );
        } );
        </script>
    <script>
        ClassicEditor
        .create( document.querySelector('#editor-content') )
        .catch( error => {
            console.error( error );
        } );
        </script>



     <!-- JAVASCRIPT -->
     <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
     <script src="{{asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
     <script src="{{asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>

     <!-- apexcharts -->
     <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
     <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

     <!-- App js -->
     <script src="{{asset('assets/js/app.js')}}"></script>



     <!-- JAVASCRIPT -->
     <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
     {{-- <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
     <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
     <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

</body>
</html>
