<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
            @yield('navbar')
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <span class="profile-text">Hello, {{ Auth::user()->name }} !</span>
                    <img class="img-xs rounded-circle" src="{{ URL::asset("images/faces/face" . ($actStaff->staffID % 4 + 1 ) . ".png") }}" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item mt-3" href="{{ URL::to('/profile') }}">
                        Profile
                    </a>
                    <a class="dropdown-item mb-2" href="{{ URL::to('/options') }}">
                        Options
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item mt-2" href="{{ URL::to('/logout') }}">
                        Sign Out
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
