<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data->travel_package->type }} Voucher</title>
    <link rel="shortcut icon" href="{{ url('frontend/images/favicon.png') }}" type="image/x-icon">
    @include('includes.style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <style>
        .txt {
            font-size: 18px !important;
        }

        .border-left {
            border-left: 6px solid var(--indigoColor);
        }

        .shadow-base {
            box-shadow: -4px 4px 20px rgba(118, 126, 148, 0.2);
        }
    </style>
    <style type="text/css" media="print">
        @page 
        {
            size: auto;
            margin: 0mm;
        }

        #download {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="header d-flex flex-wrap align-items-center justify-content-between">
            <h2 class="fw-bolder baseColor m-0 me-5">{{ $data->travel_package->type }} Voucher</h2>
            <a href="{{ route('home') }}" class="d-block"><img src="{{ url('frontend/images/logo.png') }}" width="120px"></a>
        </div>
        <div class="row m-0 mt-5">
            <div class="col-lg-4 p-0 mb-lg-0 mb-4">
                <h4 class="fw-bold mb-3">Transaction ID</h4>
                <h2 class="fw-bolder m-0 themeColor">{{ $data->id }}</h2>
            </div>
            <div class="col-lg-6 p-0">
                <h4 class="fw-bolder baseColor">{{ $data->travel_package->title }}
                    <span class="text-warning txt"><span class="mx-2"><i class="fas fa-star"></i></span>{{ $data->travel_package->rating }}</span>
                </h4>
                <h6 class="fw-bold">{{ $data->travel_package->city }}, {{ $data->travel_package->area }},
                    {{ $data->travel_package->country }}</h6>
                <p class="fw-bold mt-4">Phone Number : +{{ $data->phone_number }}</p>
                <p class="fw-bold mt-2">Email Address : {{ $data->email }}</p>
                <div class="d-flex justify-content-between mt-4">
                    <div class="border-left py-3 px-4 pe-5">
                        <p class="fw-bold">Check In</p>
                        <h5 class="fw-bolder my-2">{{ date('j F Y', strtotime($data->check_in)) }}</h5>
                        <p class="fw-bold themeColor"><span class="me-2"><i class="fas fa-clock"></i></span>10.00 A.M</p>
                    </div>
                    <div class="border-left py-3 px-4 pe-5">
                        <p class="fw-bold">Check Out</p>
                        <h5 class="fw-bolder my-2">{{ date('j F Y', strtotime($data->check_out)) }}</h5>
                        <p class="fw-bold themeColor"><span class="me-2"><i class="fas fa-clock"></i></span>2.00 A.M</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="rounded-12 text-secondary my-5" style="border: 2px solid;">
        <h4 class="fw-bolder mb-4">Booking Detail</h4>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Guest</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->name }}</h6>
            </div>
        </div>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Total Guests</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->guests == 1 ? 'Single Guest' : $data->guests.' Guests' }}</h6>
            </div>
        </div>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Duration Stay</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->duration == 1 ? 'Single Night' : $data->duration.' Nights' }}</h6>
            </div>
        </div>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Total Rooms</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->rooms == 1 ? 'Single Room' : $data->rooms.' Rooms' }}</h6>
            </div>
        </div>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Room Type</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->type_room }}</h6>
            </div>
        </div>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Transaction Status</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0 bgTheme text-white text-center p-2 fw-bold">{{ $data->transaction_status }}</h6>
            </div>
        </div>
        <hr class="rounded-12 text-secondary mt-5 mb-4" style="border: 2px solid;">
        <div class="row m-0 justify-content-between">
            <div class="col-lg-4 p-0">
                <div class="d-flex align-items-center my-2">
                    <h2 class="themeColor m-0 me-3"><i class="bi bi-clock-fill"></i></h2>
                    <div>
                        <p class="fw-bold mb-1 text-sm">Customer Service (ID)</p>
                        <h5 class="fw-bolder m-0">0813-1048-1842</5>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 d-flex flex-wrap justify-content-between">
                <div class="my-2">
                    <p class="fw-bold mb-1 text-sm">Email Customer Service</p>
                    <h5 class="fw-bolder m-0">wecare@gofest.com</h5>
                </div>
                <div class="rounded-12 mx-4" style="border: 2px solid lightgray; color: lightgray; background: lightgray;"></div>
                <div class="my-2">
                    <p class="fw-bold mb-1 text-sm">Transaction Code</p>
                    <h5 class="baseColor fw-bolder m-0">{{ $data->transaction_code }}</h5>
                </div>
            </div>
        </div>
        <center>
            <button id="download" class="btn bgColor bgHover text-white px-5 py-2 mt-5 rounded-12 fw-bold shadow-none">Download Voucher</button>
        </center>
    </div>


    <script>
        document.querySelector('#download').addEventListener('click', () => {
            window.print();
        });
    </script>
    @include('includes.script')
</body>

</html>
