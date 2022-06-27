<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn bgColor bgHover text-white" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ Auth::user()->image == null ? Storage::url('assets/user_image/user.png') : Storage::url(Auth::user()->image) }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item bg-white" href="{{ url('/') }}">
                    <button class="dropdown-item btn bgColor bgHover text-white shadow-none d-flex align-items-center" type="submit">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        <p class="m-0">Back To Home</p>
                    </button>
                </a>
                <a class="dropdown-item bg-white mt-1" href="#">
                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        
                        <button class="dropdown-item btn bgColor bgHover text-white shadow-none d-flex align-items-center" type="submit">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            <p class="m-0">Logout</p>
                        </button>
                    </form>
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->