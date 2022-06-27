<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Success</title>
    <link rel="shortcut icon" href="{{ url('frontend/images/favicon.png') }}" type="image/x-icon">
    @include('includes.style')
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container text-center">
        <img src="{{ url('frontend/images/success.png') }}" width="240px">
        <h3 class="mt-4 fw-bolder base-color"><span class="baseColor">Thank You!</span> Your Transaction Has Been Processed</h3>
        <p class="fw-medium text-secondary m-0 mt-3 mb-1">We'll email you an transaction confirmation with details and other info</p>
        <div class="d-flex align-items-center justify-content-center flex-wrap">
            <a href="{{ route('retrieve.all') }}" class="btn shadow-none bgColor bgHover text-white fw-bold rounded-12 px-5 py-2 mt-3 me-3">
                <p class="m-0">See My Booking</p>
            </a>
            <a href="{{ session()->get('contact') }}" target="_blank" class="btn shadow-none bgTheme text-white fw-bold rounded-12 px-5 py-2 mt-3 me-3">
                <p class="m-0">Contact Admin</p>
            </a>
        </div>
    </div>

    @include('includes.script')
</body>

</html>

