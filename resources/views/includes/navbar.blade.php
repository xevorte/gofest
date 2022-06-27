<nav class="navbar navbar-expand-lg navbar-light position-fixed top-0 w-100 py-lg-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('frontend/images/logo.png') }}" width="106">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-lg-4 mt-4 m-lg-0">
                <a class="nav-link text-white {{ $active == 'home' ? 'active' : '' }} me-4" aria-current="page"
                    href="{{ route('home') }}">Features</a>
                <a class="nav-link text-white {{ $active == 'destinations' ? 'active' : '' }} me-4" aria-current="page"
                    href="{{ route('destinations') }}">Destinations</a>
                <a class="nav-link text-white {{ $active == 'transportations' ? 'active' : '' }} me-4" aria-current="page"
                    href="{{ route('transportations') }}">Transportations</a>
                <a class="nav-link text-white me-4" href="#">Feedbacks</a>
            </div>
            <div class="ms-lg-auto m-lg-0 mt-4 mb-2">
                @guest
                <a href="{{ route('login') }}" class="btn text-decoration-none text-white login me-3 shadow-none">Sign
                    In</a>
                <a href="{{ route('register') }}" class="btn btn-signup bgColor text-white bgHover shadow-none">Sign
                    Up</a>
                @endguest
                @auth
                <div class="dropdown mt-1">
                    <button class="btn fw-bold text-white d-flex align-items-center p-0 shadow-none drdwn" type="button"
                        id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->image == null ? Storage::url('assets/user_image/user.png') : Storage::url(Auth::user()->image) }}" alt="profile" width="30" class="me-3 rounded-circle">
                        <p>{{ Str::limit(Auth::user()->name, 16, '') }}</p>
                    </button>
                    <ul class="dropdown-menu p-0 m-0 border-0 rounded-12 shadow overflow-hidden"
                        aria-labelledby="dropdownMenu2">
                        <li>
                            <form action="{{ route('profile.edit') }}" method="post">
                            @csrf

                            <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                            <button type="submit" class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none">
                                <p class="me-3"><i class="fas fa-user-edit"></i></p>
                                <p class="text-sm">Profile</p>
                            </button>
                            </form>
                        </li>
                        @if(Auth::user()->role == 'ADMIN')
                        <li>
                            <a href="{{ route('dashboard-home') }}"
                                class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none">
                                <p class="me-3"><i class="fas fa-fw fa-th-large"></i></p>
                                <p class="text-sm">Dashboard</p>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('retrieve.all') }}" class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none">
                                <p class="me-3"><i class="fas fa-scroll"></i></p>
                                <p class="text-sm">My Booking</p>
                            </a>
                        </li>
                        <li>
                            <form action="{{ url('logout') }}" method="post">
                                @csrf

                                <button
                                    class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none"
                                    type="submit">
                                    <p class="me-3"><i class="fas fa-sign-out-alt"></i></p>
                                    <p class="text-sm">Logout</p>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
