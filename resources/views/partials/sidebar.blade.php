<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="user-wrapper">
            <div class="profile-image">
                <img src="{{ URL::asset("images/faces/face" . ($actStaff->staffID % 4 + 1 ) . ".png") }}" alt="profile image">
            </div>
            <div class="text-wrapper">
                <p class="profile-name">{{ $actStaff->getFullName() }}</p>
                <div>
                <small class="designation text-muted">{{ $actStaff->getFunction() }}</small>
                <span class="status-indicator online"></span>
                </div>
            </div>
            </div>
        </div>
        </li>
        <li><div class="dropdown-divider"></div></li>
        <li class="nav-item nav-link">
        <form action="{{ URL::to('/search') }}" method="GET">
            <input class="form-control" id="q" name="q" type="text" placeholder="Search" aria-label="Search">
        </form>
        </li>
        <li><div class="dropdown-divider"></div></li>
        <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/') }}">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/patients') }}">
            <i class="menu-icon mdi mdi-wheelchair-accessibility"></i>
            <span class="menu-title">Patients</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/users') }}">
            <i class="menu-icon mdi mdi-account-multiple"></i>
            <span class="menu-title">Users</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/profile') }}">
            <i class="menu-icon mdi mdi-face"></i>
            <span class="menu-title">Profile</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/options') }}">
            <i class="menu-icon mdi mdi-settings"></i>
            <span class="menu-title">Options</span>
        </a>
        </li>
    </ul>
</nav>
