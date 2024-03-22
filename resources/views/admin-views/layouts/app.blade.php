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

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="guage" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
        </symbol>

        <symbol id="home" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
        </symbol>

        <symbol id="users" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
        </symbol>
        <symbol id="technicians" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
        </symbol>

        <symbol id="reports" viewBox="0 0 16 16">
            <path d="M5.523 10.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
            <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.6 11.6 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
        </symbol>

        <symbol id="doctors" viewBox="0 0 16 16">
            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1zM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25z" />
            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1zm2 14h2v-3H7zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1zm0-14H6v1h4zm2 7v7h3V8zm-8 7V8H1v7z" />
        </symbol>

        <symbol id="logout" viewBox="0 0 16 16">
            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z" />
        </symbol>


    </svg>

    <div id="app">
        <div class="container-fluid" style="padding-top: 0px; position:fixed">
            <div class="row flex-nowrap">
                @auth('admins')
                <div class="bg-dark col-auto col-md-4 col-lg-2 min-vh-100 d-flex flex-column justify-content-between">

                    <div class="bg-dark p-2">
                        <a class="navbar-brand text-white  d-flex  justify-content-center fw-bolder" href="{{ url('/admin') }}">
                            <span class="fs-4 d-sm-inline ms-2 text-white">ABC LABS</span>
                        </a>
                        <div class="d-flex justify-content-center">
                            <div class="ms-2 d-flex justify-content-center">
                                <div class="rounded-circle d-flex justify-content-center">
                                    <div class="rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#F9F9F9" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center h3 font-family mt-2 admin-name text-white">{{auth()->user()->name}}</div>

                        <ul class="nav nav-pills flex-column mt-4">
                            <li class="nav-item py-2 py-sm-0 nav_hover  @if(request()->routeIs('admin.dashboard')) active mb-1 mt-1 @endif">
                                <a href="{{route('admin.dashboard')}}" class="nav-link text-white d-flex align-items-center">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#guage" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2">Dashboard</span>
                                </a>
                            </li>

                            <div class="nav-item py-2 py-sm-0 nav_hover @if(request()->routeIs('admin.appointments')) active mb-1 mt-1 @endif">
                                <a href="{{route('admin.appointments')}}" class="nav-link  d-flex align-items-center">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#home" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2 text-white">Appointments</span>
                                </a>
                            </div>

                            <div class="nav-item py-2 py-sm-0 nav_hover  @if(request()->routeIs('admin.test_types')) active mb-1 mt-1 @endif">
                                <a href="{{route('admin.test_types')}}" class="nav-link d-flex align-items-center">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#doctors" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2 text-white">Test Types</span>
                                </a>
                            </div>

                            <div class="nav-item py-2 py-sm-0 nav_hover  @if(request()->routeIs('admin.patients')) active mb-1 mt-1 @endif">
                                <a href="{{route('admin.patients')}}" class="nav-link d-flex align-items-center">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#users" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2 text-white">Patients</span>
                                </a>
                            </div>

                            <div class="nav-item py-2 py-sm-0 nav_hover  @if(request()->routeIs('admin.technicians')) active mb-1 mt-1 @endif">
                                <a href="{{route('admin.technicians')}}" class="nav-link d-flex align-items-center">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#technicians" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2 text-white">Technicians</span>
                                </a>
                            </div>

                            <div class="nav-item py-2 py-sm-0 nav_hover  @if(request()->routeIs('admin.doctors')) active mt-1 @endif">
                                <a href="{{route('admin.doctors')}}" class="nav-link d-flex align-items-center">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#doctors" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2 text-white ">Doctors</span>
                                </a>
                            </div>
                            <div class="col-12 nav-item py-2 py-sm-0 nav_hover">

                                <a class="nav-link d-flex align-items-center" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                     
                                     document.getElementById('logout-form').submit();">
                                    <svg class="bi me-2" width="24" height="40" fill="#FFFFFF">
                                        <use xlink:href="#logout" />
                                    </svg>
                                    <span class="fs-4 d-none d-sm-inline ms-2 text-white ">Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </ul>
                    </div>
                </div>
                @endauth
                <main class="col py-4" style="width: 76%;">
                    @yield('content')
                </main>
            </div>

        </div>

        <!-- Footer -->
        <footer class="page-footer font-small blue footer-end" style="position: fixed; width: 100%; bottom: 0;">
            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Designed and Built by <a href="#" class="text-decoration-none text-sm text-gray-500 sm:text-right sm:ml-0">Rajeew Uvindu</a>
            </div>
        </footer>
        <!-- Footer -->
</body>

</html>