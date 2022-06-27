<!-- Sidebar -->
<ul class="navbar-nav bgColor sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('destinations.index') }}">
        <img src="{{ url('frontend/images/logo2.png') }}" width="64%">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-1 mb-3">

    <!-- Nav Item -->
    <li class="nav-item mx-md-4 my-2 rounded-5 {{ $active == 'menu' ? 'active' : '' }}"">
        <a class="nav-link py-2" href="{{ route('dashboard-home') }}">
            <i class="fas fa-fw fa-th-large"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item mx-md-4 my-2 rounded-5 {{ $active == 'destinations' ? 'active' : '' }}">
        <a class="nav-link py-2" href="{{ route('destinations.index') }}">
            <i class="fas fa-fw fa-suitcase-rolling"></i>
            <span>Destinations</span></a>
    </li>

    <li class="nav-item mx-md-4 my-2 rounded-5 {{ $active == 'transportation' ? 'active' : '' }}">
        <a class="nav-link py-2" href="{{ route('transportation.index') }}">
            <span class="mr-1"><i class="fas fa-fw fa-plane-departure"></i></span>
            <span>Transportations</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item {{ $active == 'destination-type' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Destination by Type</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select Destination</h6>
                <a class="collapse-item" href="{{ route('destinations.show', 'Hotels') }}">Hotels</a>
                <a class="collapse-item" href="{{ route('destinations.show', 'Hostels') }}">Hostels</a>
                <a class="collapse-item" href="{{ route('destinations.show', 'Apartments') }}">Apartments</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item {{ $active == 'destination-location' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-map-marked-alt"></i>
            <span>Destination by Location</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select Destination</h6>
                <a class="collapse-item" href="{{ route('destinations.show', 'Japanese') }}">Japanese</a>
                <a class="collapse-item" href="{{ route('destinations.show', 'Indonesia') }}">Indonesia</a>
                <a class="collapse-item" href="{{ route('destinations.show', 'Hong Kong') }}">Hong Kong</a>
                <a class="collapse-item" href="{{ route('destinations.show', 'Germany') }}">Germany</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item mx-md-4 my-2 rounded-5 {{ $active == 'gallery' ? 'active' : '' }}">
        <a class="nav-link py-2" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Galleries</span></a>
    </li>

    <li class="nav-item mx-md-4 overflow-hidden my-2 rounded-5 {{ $active == 'transactions' ? 'active' : '' }}">
        <a class="nav-link py-2" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Transactions</span>
        </a>
        <div id="collapseTwo" class="collapse p-0" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white px-3 py-2 mb-3 rounded-5">
                <a class="btn p-0 my-1 baseColor collapse-item shadow-none" href="{{ route('transaction-destinations.index') }}"><small>Destinations</small></a>
                <a class="btn p-0 my-1 baseColor collapse-item shadow-none" href="{{ route('transaction-transportations.index') }}"><small>Transportations</small></a>
            </div>
        </div>
    </li>

    <li class="nav-item mx-md-4 my-2 rounded-5 {{ $active == 'reviews' ? 'active' : '' }}">
        <a class="nav-link py-2" href="{{ route('reviews.index') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Reviews</span></a>
    </li>

</ul>
<!-- End of Sidebar -->