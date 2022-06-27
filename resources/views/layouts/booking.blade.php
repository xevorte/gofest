<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ url('frontend/images/favicon.png') }}" type="image/x-icon">
    @include('includes.style')
    @stack('addonStyle')
    <style>
        body, .bg-color-light {
            background: #f2f0ff;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            padding-right: 6vw;
        }

        .bg-warning-light {
            background-color: rgb(255, 243, 188);
        }

        .bg-theme-light {
            background-color: #e9fff0d2;
        }

        .border-theme {
            border: 2px solid var(--limeColor);
        }

        .btnPayment {
            padding: .6em;
        }

        .rounded-6, .nav-pills .nav-link {
            border-radius: 6px;
        }

        .nav-pills .nav-link.active {
            background-color: var(--indigoColor);
            color: white !important;
        }
    </style>
</head>

<body>
    <nav class="navbar bgColor py-lg-2">
        <div class="container d-flex align-items-center justify-content-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('frontend/images/logo2.png') }}" width="100">
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row m-0 justify-content-center">
            <div class="col-lg-10 p-0">
                <nav class="bg-white py-4 mb-5 rounded-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 justify-content-evenly align-items-center">
                        <li class="breadcrumb-item d-flex align-items-center">
                            <button class="btn py-1 px-2 shadow-none text-sm text-white fw-bolder me-3 {{ $active == 'fill-in-data' ? 'bgColor' : 'bg-secondary-light' }}">1</button>
                            <h6 class="fw-bold m-0 {{ $active == 'fill-in-data' ? '' : 'text-secondary-light' }}">Fill in data</h6>
                        </li>
                        @if(isset($destination))
                        <li class="breadcrumb-item d-flex align-items-center">
                            <button class="btn py-1 px-2 shadow-none text-sm text-white fw-bolder me-3 {{ $active == 'review' ? 'bgColor' : 'bg-secondary-light' }}">2</button>
                            <h6 class="fw-bold m-0 {{ $active == 'review' ? '' : 'text-secondary-light' }}">Review</h6>
                        </li>
                        <li class="breadcrumb-item d-flex align-items-center">
                            <button class="btn py-1 px-2 shadow-none text-sm text-white fw-bolder me-3 {{ $active == 'payment' ? 'bgColor' : 'bg-secondary-light' }}">3</button>
                            <h6 class="fw-bold m-0 {{ $active == 'payment' ? '' : 'text-secondary-light' }}">Payment</h6>
                        </li>
                        <li class="breadcrumb-item d-flex align-items-center">
                            <button class="btn py-1 px-2 shadow-none text-sm text-white fw-bolder me-3 {{ $active == 'process' ? 'bgColor' : 'bg-secondary-light' }}">4</button>
                            <h6 class="fw-bold m-0 {{ $active == 'process' ? '' : 'text-secondary-light' }}">Process</h6>
                        </li>
                        @else
                        <li class="breadcrumb-item d-flex align-items-center">
                            <button class="btn py-1 px-2 shadow-none text-sm text-white fw-bolder me-3 {{ $active == 'payment' ? 'bgColor' : 'bg-secondary-light' }}">2</button>
                            <h6 class="fw-bold m-0 {{ $active == 'payment' ? '' : 'text-secondary-light' }}">Payment</h6>
                        </li>
                        <li class="breadcrumb-item d-flex align-items-center">
                            <button class="btn py-1 px-2 shadow-none text-sm text-white fw-bolder me-3 {{ $active == 'process' ? 'bgColor' : 'bg-secondary-light' }}">3</button>
                            <h6 class="fw-bold m-0 {{ $active == 'process' ? '' : 'text-secondary-light' }}">Process</h6>
                        </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
        @yield('content')
    </div>
    
    @include('includes.script')
    @stack('addonScript')
</body>

</html>
