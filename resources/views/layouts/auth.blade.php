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
</head>

<body class="auth">
    <nav class="navbar bgColor py-lg-3">
        <div class="container d-flex align-items-center justify-content-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('frontend/images/logo2.png') }}" width="125">
            </a>
        </div>
    </nav>

    @yield('content')
    
    @include('includes.script')
    @stack('addonScript')
</body>

</html>
