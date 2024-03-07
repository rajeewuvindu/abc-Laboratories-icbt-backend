<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>
    <title>{{ config('app.name', 'Hayleys Fentons') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <div id="app">
        <!-- Navbar Only after Authentication -->
        <!-- No Navbar if not authenticated -->
        <!-- <div class="row justify-content-center py-5">
                    <img src="{{ asset('images/fentons_logo.svg') }}" alt="fentons_logo" height="100vh">
                </div> -->

        <div style="margin-bottom:75px;">
            <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm" style="position: fixed; width: 100%; top: 0; z-index: 102;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/fentons_logo.svg') }}" alt="fentons_logo" height="50vh">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

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
                                    {{ Auth::user()->admin_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        <div class="row" id="myFlexContainer" style="width: 100%;">
            @auth('admins')
            <div style="width: auto; ">
                <div id='marginCorrected' class="navbar navbar-expand-xl navbar-light shadow-sm d-flex flex-column " style="margin-left:60px;width:100%;">
                    <button style="margin-left: -60px;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidenavbarSupportedContent" aria-controls="sidenavbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" onclick="toggleFullWidth()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="positionFixedContainer" style="position:fixed; z-index:101; background-color:#fff; margin-top:5px; width: 200px;">
                        <div class="collapse navbar-collapse" id="sidenavbarSupportedContent">

                            <ul class="nav flex-column mb-auto hover-nav">
                                <li>
                                    <!-- <a href="#" class="nav-link active" aria-current="page"> -->
                                    <a href="{{ route('admin.users') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#people-circle" />
                                        </svg>
                                        Users
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.cashier') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#cashier" />
                                        </svg>
                                        Cashier
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.department') }}" class=" nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#department" />
                                        </svg>
                                        Department
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.cost_centers') }}" class=" nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#cost_center" />
                                        </svg>
                                        Cost Centers
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.banks') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#bank" />
                                        </svg>
                                        Banks
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.authlevels') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#authorization-levels" />
                                        </svg>
                                        Authorization Levels
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.viewCategories') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#Categories" />
                                        </svg>
                                        Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.projects') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#project" />
                                        </svg>
                                        Projects
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ asset('docs/FentonsCashApp-WebPanelUserManual.pdf') }}" target="_blank" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#help" />
                                        </svg>
                                        User Manual
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="contentWindow" style="width:86%; margin-top:5px;margin-left:120px; ">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>

        @endauth

        @guest('admins')
        <div>
            <main class="col py-4">
                @yield('content')
            </main>
        </div>
        @endguest
    </div>


    <!-- Footer -->
    <footer class="page-footer font-small blue footer-end">
        <!-- Footer -->
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Designed and Built by <a href="https://jwareautomation.com/" class="text-decoration-none text-sm text-gray-500 sm:text-right sm:ml-0">jWare Automation</a>
        </div>
    </footer>


    <script>
        function toggleFullWidth() {
            var flexContainer = document.getElementById('myFlexContainer');
            // var currentDirection = flexContainer.style.flexDirection;
            // if (currentDirection === 'row') {
            //     flexContainer.style.flexDirection = 'column';
            // } else {
            //     flexContainer.style.flexDirection = 'row';
            // }

            var fixedContainer = document.getElementById('positionFixedContainer');
            var currentPosition = fixedContainer.style.position;
            if (currentPosition === 'fixed') {
                fixedContainer.style.position = 'static';

            } else {
                fixedContainer.style.position = 'fixed';

            }

            // var currentJustifyContent = flexContainer.style.justifyContent;
            // if (currentJustifyContent === 'space-between') {
            //     flexContainer.style.justifyContent = 'flex-start';
            // } else {
            //     flexContainer.style.justifyContent = 'space-between';
            // }

            var flexContainer = document.getElementById('marginCorrected');
            if (flexContainer.style.marginLeft === '60px') {
                flexContainer.style.marginLeft = '0px';
            } else if (flexContainer.style.marginLeft === '0px') {
                flexContainer.style.marginLeft = '60px';
            }

            var contentWindow = document.getElementById('contentWindow');
            contentWindow.style.width = '90%';
            contentWindow.style.margin = 'auto';



        }
    </script>

    <!-- Footer -->
    <script src="{{ asset('js/requests-table.js') }}" defer></script>

</body>

</html>