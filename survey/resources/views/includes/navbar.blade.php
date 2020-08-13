<nav
class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top navbar-fixed-top"
data-aos="fade-down"
>
<div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
        <h1 style="font-size: 1.75em;">Komo<span class="text-primary">data</span></h1>
    </a>
    <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarResponsive"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('home')}}">Home </a>
        </li>
        <li class="nav-item {{ (request()->is('categories*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories') }}">Categories</a>
        </li>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        <li class="nav-item">
            <a
                class="btn btn-primary nav-link px-4 text-white"
                href="{{ route('login') }}"
                >Login</a
            >
        </li>
        @endguest
    </ul>
        @auth
        <!-- Desktop Menu -->
        <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
                <a
                    href="#"
                    class="nav-link"
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
                <div class="dropdown-menu">
                    @if (Auth::user()->roles === 'SURVEYOR')
                        <a href="{{ route('surveyor-dashboard') }}" class="dropdown-item">Dashboard</a>
                    @else
                        <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                    @endif
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

        <ul class="navbar-nav d-block d-lg-none">
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
                    @if (Auth::user()->roles === 'SURVEYOR')
                        <a href="{{ route('surveyor-dashboard') }}" class="dropdown-item">Dashboard</a>
                    @else
                        <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                    @endif
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
        @endauth
    </div>
</div>
</nav>