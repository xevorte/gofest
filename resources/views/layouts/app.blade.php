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

<body>
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')
    @include('includes.script')
    @stack('addonScript')
</body>

</html>
