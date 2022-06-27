@extends('layouts.booking')

@section('title')
Book {{ $transportation->company_name }} | From {{ $data->from }} To {{ $data->to }}
@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="title mb-5">
            <h2 class="fw-bolder mb-3">Payment</h2>
            <h6 class="fw-bold">Choose the payment that suits you</h6>
        </div>
    </div>
</div>
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="row m-0 justify-content-lg-between justify-content-center">
            <div class="col-lg-7 p-0">
                <div class="payment-info alert fade show mb-5 p-0">
                    <div class="p-4 rounded-12 bg-white">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link baseColor fw-bold px-4 py-2 active" id="pills-home-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">
                                    <p>Bank Payment</p>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link baseColor fw-bold px-4 py-2 mx-3" id="pills-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">
                                    <p>ATM</p>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link baseColor fw-bold px-4 py-2" id="pills-contact-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">
                                    <p>Credit Card</p>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <h5 class="fw-bold my-4">Bank Transfer</h5>
                                <div class="p-3 d-flex align-items-center border-theme bg-theme-light rounded-3 mb-4">
                                    <h5 class="themeColor m-0 me-3"><i class="fas fa-info-circle"></i></h5>
                                    <p class="fw-bold">You can transfer from any banking channel (m-banking, SMS banking
                                        or
                                        ATM).</p>
                                </div>
                                <h6 class="fw-bold">Select a Bank Type</h6>
                                <form action="{{ route('payment-process-transportation', $transportation->slug) }}" method="post">
                                    @csrf
                                    <div
                                        class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                        <div class="form-check m-0">
                                            <input class="form-check-input border shadow-none mt-1 me-3" type="radio"
                                                name="payment_name" id="Mandiri" value="Mandiri">
                                            <label class="form-check-label" for="Mandiri">
                                                <p class="fw-bold">Mandiri Transfer</p>
                                            </label>
                                        </div>
                                        <img src="{{ url('frontend/images/banks/mandiri.png') }}" width="55">
                                    </div>
                                    <div
                                        class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                        <div class="form-check m-0">
                                            <input class="form-check-input border shadow-none mt-1 me-3" type="radio"
                                                name="payment_name" id="BCA" value="BCA">
                                            <label class="form-check-label" for="BCA">
                                                <p class="fw-bold">BCA Transfer</p>
                                            </label>
                                        </div>
                                        <img src="{{ url('frontend/images/banks/bca.png') }}" width="55">
                                    </div>
                                    <div
                                        class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                        <div class="form-check m-0">
                                            <input class="form-check-input border shadow-none mt-1 me-3" type="radio"
                                                name="payment_name" id="BRI" value="BRI">
                                            <label class="form-check-label" for="BRI">
                                                <p class="fw-bold">BRI Transfer</p>
                                            </label>
                                        </div>
                                        <img src="{{ url('frontend/images/banks/bri.png') }}" width="55">
                                    </div>
                                    <div
                                        class="px-3 d-flex align-items-center justify-content-between border rounded-3 mt-3">
                                        <div class="form-check m-0">
                                            <input class="form-check-input border shadow-none mt-1 me-3" type="radio"
                                                name="payment_name" id="BNI" value="BNI">
                                            <label class="form-check-label" for="BNI">
                                                <p class="fw-bold">BNI Transfer</p>
                                            </label>
                                        </div>
                                        <img src="{{ url('frontend/images/banks/bni.png') }}" width="55">
                                    </div>
                                    <div class="bg-color-light px-3 py-4 rounded-12 my-4">
                                        <h6 class="fw-bolder mb-4">Price Details</h6>
                                        @for($i = 0; $i < $data->guests; $i++)
                                            <div class="row m-0 my-3 justify-content-between">
                                                <div class="col-8 p-0">
                                                    <p class="fw-bold">{{ $transportation->company_name }} Seat (1x)</p>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <p class="fw-bold float-end">$ {{ $data->price }}</p>
                                                </div>
                                            </div>
                                        @endfor
                                            <div class="row m-0 my-3 justify-content-between">
                                                <div class="col-8 p-0">
                                                    <p class="fw-bold">Taxes and Fees</p>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <p class="fw-bold float-end">$ {{ $data->taxPrice }}</p>
                                                </div>
                                            </div>
                                            <hr class="border-2 my-4">
                                            <div class="row m-0 justify-content-between">
                                                <div class="col-8 p-0">
                                                    <p class="fw-bold">Total Price</p>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <p class="fw-bold float-end">$ {{ $data->transaction_total }}</p>
                                                </div>
                                            </div>
                                    </div>


                                    <input type="hidden" name="payment_type" id="payment_type" value="Bank Transfer">
                                    <input type="hidden" name="transaction_code" id="transaction_code"
                                        value="{{ $data->transaction_code }}">

                                    <button type="submit"
                                        class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">
                                        <p>Pay with Bank Transfer</p>
                                    </button>
                                </form>
                                <p class="fw-bold mt-4 text-center text-sm">By clicking this button, you acknowledge
                                    that you
                                    have read
                                    and agreed to
                                    the <a href="#" class="text-decoration-none baseColor">Terms & Conditions</a> and <a
                                        href="#" class="text-decoration-none baseColor">Privacy Policy</a> of Gofest</p>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-5">
                <div class="notice mb-5 p-0">
                    <div class="p-4 rounded-12 bg-white">
                        <h5 class="fw-bolder m-0">Booking Details</h5>
                        <hr class="text-secondary">
                        <h6 class="fw-bold baseColor mb-2">{{ $transportation->company_name }}</h6>
                        <p class="fw-bold my-1">Departure Date : {{ date('l, F j, Y', strtotime($data->departure_date)) }}</p>
                        <p class="fw-bold my-1">Departure Time : {{ date('H:i:s', strtotime($data->departure_time)) }}</p>
                        <p class="fw-bold my-1">{{ $data->guests == 1 ? 'Single Seat' : $data->guests.' Seats' }}</p>
                        <hr class="text-secondary mt-4">
                        <h5 class="fw-bolder mb-2">Guest Details</h5>
                        <p class="fw-bold my-1">{{ $data->name }}</p>
                        <p class="fw-bold my-1">{{ $data->email }}</p>
                        <p class="fw-bold my-1">+{{ $data->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
