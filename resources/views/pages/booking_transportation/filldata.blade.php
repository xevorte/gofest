@extends('layouts.booking')

@section('title')
Book {{ $transportation->company_name }} | From {{ $data->from }} To {{ $data->to }}
@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="title mb-5">
            <h2 class="fw-bolder mb-3">{{ $transportation->type }} Booking</h2>
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
                        <p class="fw-bold">{{ $transportation->type }} only accepts guests with minimum age of 20 </p>
                    </div>
                </div>
                <div class="information mb-5">
                    <h6 class="fw-bolder mb-3">Your information</h6>
                    <div class="p-4 rounded-12 bg-white">
                        <form action="{{ route('payment-transportation', $transportation->slug) }}" method="post">
                            @csrf

                            <input type="hidden" name="transportations_id" id="transportations_id" value="{{ $transportation->id }}">
                            <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="transaction_code" id="transaction_code" value="{{ "GF".mt_rand(1000,9999) }}">
                            <input type="hidden" name="from" id="from" value="{{ $data->from }}">
                            <input type="hidden" name="to" id="to" value="{{ $data->to }}">
                            <input type="hidden" name="guests" id="guests" value="{{ $data->guests }}">
                            <input type="hidden" name="departure_date" id="departure_date" value="{{ $data->departure_date }}">
                            <input type="hidden" name="departure_time" id="departure_time" value="{{ date("H:i:s", strtotime($data->departure_time)) }}">
                            <input type="hidden" name="class" id="class" value="{{ $data->class }}">
                            <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $totalPrice }}">
                            <input type="hidden" name="transaction_status" id="transaction_status" value="PENDING">
                            <input type="hidden" name="taxPrice" id="taxPrice" value="{{ $taxPrice }}">
                            <input type="hidden" name="price" id="price" value="{{ $price }}">
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
                        <div class="d-flex align-items-center justify-content-between mt-3 mb-4">
                            <h6 class="fw-bold">Total</h6>
                            <h6 class="fw-bold">$ 
                                {{ $totalPrice }}
                            </h6>
                        </div>
                        <hr class="mt-3 mb-4 text-secondary">
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <h6 class="fw-bold">{{ $data->guests }} Guests</h6>
                            <h6 class="fw-bold">$ {{ $price * $data->guests }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bold">Taxes and Fees</h6>
                            <h6 class="fw-bold">$ {{ $taxPrice }}</h6>
                        </div>
                    </div>
                    <button type="submit" class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">Continue to Payment</button>

                    <button type="submit" formaction="{{ route('pay-later-transportation') }}" class="btn bg-secondary-light fw-bold text-white w-100 btnPayment rounded-6 mt-3">Pay Later
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
                        <img src="{{ Storage::url($transportation->image) }}" alt="destination" class="img-fluid p-4" style="border-radius: 2em;">
                        <div class="d-flex justify-content-center align-items-center">
                            @if($transportation->type == 'Flights')
                            <h3 class="m-0 me-3 baseColor"><i class="fas fa-plane-departure"></i></h3>
                            @elseif($transportation->type == 'Trains')
                            <h3 class="m-0 me-3 baseColor"><i class="fas fa-train"></i></h3>
                            @else
                            <h3 class="m-0 me-3 baseColor"><i class="fas fa-bus"></i></h3>
                            @endif
                            <h5 class="fw-bold m-0">{{ $transportation->company_name }}</h5>
                        </div>
                        <div class="bgColor p-4 mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="fw-bold text-white m-0">From (Origin Place)</p>
                                <p class="fw-bold text-white m-0">{{ $data->from }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fw-bold text-white m-0">To (Destination Place)</p>
                                <p class="fw-bold text-white m-0">{{ $data->to }}</p>
                            </div>
                        </div>
                        <div class="bgTheme p-4 text-center d-flex justify-content-between align-items-center">
                            <p class="fw-bold text-white m-0">Departure</p>
                            <p class="fw-bold text-white m-0">{{ date('D, j F Y', strtotime($data->departure_date)) }}, {{ date("H:i:s", strtotime($data->departure_time)) }}</p>
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
