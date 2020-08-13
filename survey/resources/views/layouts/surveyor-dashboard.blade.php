<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
/>
<meta name="description" content="" />
<meta name="author" content="" />

<title>@yield('title')</title>

@stack('prepend-style')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<link href="{{ asset('style/main.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
@stack('addon-style')
</head>

<body>
<div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
        <div class="border-right" id="sidebar-wrapper"> 
            <div class="sidebar-heading text-center">
                <img src="{{ asset('images/admin.svg') }}" alt="" class="my-4" style="max-width: 150px"/>
            </div>
            <div class="list-group list-group-flush">
                <a
                    href="{{ route('surveyor-dashboard') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}"
                    >Dashboard</a
                >
                <a
                    href="{{ route('surveyor-commodities.index') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard/surveyor-commodities*')) ? 'active' : '' }}"
                    >Commodities</a
                >
                <a
                    href="{{ route('surveyor-account.index') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard/surveyor-account*')) ? 'active' : '' }}"
                    >Account</a
                >
            </div>
        </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
            >
                <button
                    class="btn btn-secondary d-md-none mr-auto mr-2"
                    id="menu-toggle"
                >
                    &laquo; Dashboard Menu
                </button>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto d-none d-lg-flex">
                        <li class="nav-item dropdown">
                            <a
                            class="nav-link"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            @if (Auth::User()->photo === '')
                                <img
                                    src="{{ url('images/default-user.png') }}"
                                    alt=""
                                    class="rounded-circle mr-2 profile-picture"
                                />
                            @else
                                <img
                                    src="{{ url(Auth::user()->photo) }}"
                                    alt=""
                                    class="rounded-circle mr-2 profile-picture"
                                />
                            @endif
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{ route('home') }}" class="dropdown-item">Go to Home Page</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </ul>
                        <!-- Mobile Menu -->
                        <ul class="navbar-nav d-block d-lg-none mt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link" 
                                    id="navbarDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('home') }}" class="dropdown-item">Home</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </ul>
                </div>
            </nav>

            <!-- Page Content -->
                @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
@stack('prepend-script')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script src="{{ url('https://unpkg.com/aos@2.3.1/dist/aos.js') }}"></script>
<script>
    AOS.init();
</script>
<script>
    $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
</script>
@stack('addon-script')
</body>
</html>
