<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


    <!-- Topbar Navbar -->
    <ul class="mx-2 navbar-nav container-fluid">
        <div class="px-2 lead"><b>@yield('heading')</b></div>

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle ">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow px-2">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu  shadow animated--grow-in {{$dir == 'rtl' ? 'text-right' : ''}}">
                <a class="dropdown-item py-2" href="{{ route('profile.show') }}">
                    <i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
                    {{ __('Profile') }}
                </a>

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
