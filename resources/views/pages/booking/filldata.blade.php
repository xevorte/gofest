@extends('layouts.booking')

@section('title')
Book {{ $destination->title }}
@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="title mb-5">
            <h2 class="fw-bolder mb-3">{{ $destination->type }} Booking</h2>
            <h6 class="fw-bold">Fill in contact and guest details below</h6>
        </div>
    </div>
</div>
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="row m-0 justify-content-lg-between justify-content-center">
            <div class="col-lg-7 p-0 pe-lg-5">
                <div class="notice alert fade show mb-5 p-0">
                    <h6 class="fw-bolder mb-3">Warning</h6>
                    <div class="p-4 rounded-12 bg-warning-light">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <h4 class="m-0 me-3"><i class="fas fa-exclamation"></i></h4>
                                <h5 class="fw-bold m-0">Important Notice</h5>
                            </div>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <p class="fw-bold my-3">As COVID-19 situation evolves, make sure the cancellation policy suits your
                            needs.</p>
                        <p class="fw-bold mb-3">The following fees and deposits are charged by the property at time of service,
                            check-in, or check-out. </p>
                        <p class="fw-bold">{{ $destination->type }} only accepts guests with minimum age of 20 </p>
                    </div>
                </div>
                <div class="information mb-5">
                    <h6 class="fw-bolder mb-3">Your information</h6>
                    <div class="p-4 rounded-12 bg-white">
                        <form action="{{ route('review', $destination->slug) }}" method="post">
                            @csrf

                            <input type="hidden" name="check_in" id="check_in" value="{{ $data->check_in }}">
                            <input type="hidden" name="check_out" id="check_out" value="{{ date('Y-m-d', strtotime($data->check_in.'+'.$data->duration.' days')) }}">
                            <input type="hidden" name="rooms" id="rooms" value="{{ $data->rooms }}">
                            <input type="hidden" name="roomPrice" id="roomPrice" value="{{ $roomPrice }}">
                            <input type="hidden" name="guests" id="guests" value="{{ $data->guests }}">
                            <input type="hidden" name="duration" id="duration" value="{{ $data->duration }}">
                            <input type="hidden" name="durationPrice" id="durationPrice" value="{{ $durationPrice }}">
                            <input type="hidden" name="type_room" id="type_room" value="{{ $data->type_room }}">
                            <input type="hidden" name="typePrice" id="typePrice" value="{{ $typePrice }}">
                            <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $totalPrice }}">
                            <div class="form-group">
                                <label for="name" class="form-label fw-bold">
                                    <p>Contact's name</p>
                                </label>
                                <input type="text" name="name" id="name"
                                    class="form-control border px-2 py-1 rounded-3 shadow-none" required>
                                <p class="text-sm text-secondary mt-2">As in Passport/Official ID Card (without title/special
                                    characters)</p>
                            </div>
                            <div class="row m-0 mt-4">
                                <div class="col-lg-6 p-0">
                                    <div class="form-group">
                                        <label for="email" class="form-label fw-bold">
                                            <p>Email Address</p>
                                        </label>
                                        <input type="email" name="email" id="email"
                                            class="form-control border px-2 py-1 rounded-3 shadow-none" required>
                                        <p class="text-sm text-secondary mt-2">e.g.: email@example.com</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0 ps-lg-4">
                                    <div class="form-group">
                                        <label for="phone_number" class="form-label fw-bold">
                                            <p>Reachable phone number</p>
                                        </label>
                                        <input type="number" name="phone_number" id="phone_number"
                                            class="form-control border px-2 py-1 rounded-3 shadow-none" required>
                                        <p class="text-sm text-secondary mt-2">e.g. +62812345678, for Country Code (+62) and
                                            Mobile No. 0812345678</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="price mb-4">
                    <h6 class="fw-bolder mb-3">Price details</h6>
                    <div class="p-4 rounded-12 bg-white mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bold">Total</h6>
                            <h6 class="fw-bold">$ 
                                {{ $totalPrice }}
                            </h6>
                        </div>
                        <hr class="mt-3 mb-4 text-secondary">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bold">{{ $data->rooms }} Rooms ({{ $data->duration }} nights, {{ $data->guests }} guests)</h6>
                            <h6 class="fw-bold">$ {{ $roomPrice }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <h6 class="fw-bold">{{ $data->type_room }} (type)</h6>
                            <h6 class="fw-bold">$ {{ $typePrice }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bold">Taxes and Fees</h6>
                            <h6 class="fw-bold">$ {{ $taxPrice }}</h6>
                        </div>
                    </div>
                    <button type="submit" class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">Continue to
                        Review
                    </button>
                    </form>
                </div>
                <p class="fw-bold mb-5 text-center">By clicking this button, you acknowledge that you have read and agreed to
                    the <a href="#" class="text-decoration-none baseColor">Terms & Conditions</a> and <a href="#"
                        class="text-decoration-none baseColor">Privacy Policy</a> of GOFEST</p>
            </div>
            <div class="col-lg-5 p-0">
                <div class="detail mb-5">
                    <div class="rounded-12 bg-white overflow-hidden">
                        <img src="{{ $destination->galleries->count() ? Storage::url($destination->galleries->first()->image) : Storage::url('assets/gallery/default.jpg') }}" alt="destination" class="img-fluid p-4 w-100" style="border-radius: 2em;">
                        <div class="d-flex justify-content-center align-items-center">
                            <h3 class="m-0 me-3 baseColor"><i class="fas fa-building"></i></h3>
                            <h5 class="fw-bold m-0">{{ $destination->title }}</h5>
                        </div>
                        <div class="bgColor p-4 mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="fw-bold text-white m-0">Check in</p>
                                <p class="fw-bold text-white m-0">{{ date('D, j F Y', strtotime($data->check_in)) }}, From 10.00 A.M</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fw-bold text-white m-0">Check out</p>
                                <p class="fw-bold text-white m-0">{{ date('D, j F Y', strtotime($data->check_in.'+'.$data->duration.' days')) }}, Before 2.00 P.M</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="information mb-5">
                    <h6 class="fw-bolder mb-3">Cancellation policy</h6>
                    <div class="p-4 rounded-12 bg-white">
                        <p class="fw-bold">Cancellation will incur fee.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
