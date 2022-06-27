<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.admin.style2')
    @stack('addonStyle')
</head>

<body>

    <div class="row justify-content-lg-start justify-content-center align-items-center m-0">
        <div class="col-xl-5 col-lg-7 col-sm-10 py-sm-0 px-sm-5 p-4">
            <div class="card border-0">
                <div class="card-body d-flex flex-column justify-content-between">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('includes.admin.script2')
</body>

</html>
