@extends('layouts.booking')

@section('title')
Book {{ $destination->title }}
@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="title mb-5">
            <h2 class="fw-bolder mb-3">Please Review Your Booking</h2>
            <h6 class="fw-bold">Please review your booking details before continuing to payment</h6>
        </div>
    </div>
</div>
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="row m-0 justify-content-lg-between justify-content-center">
            <div class="col-lg-7 p-0">
                <div class="information mb-5">
                    <div class="p-4 rounded-12 bg-white">
                        <div class="row m-0 align-items-center">
                            <div class="col-lg-4 p-0">
                                <img src="{{ $destination->galleries->count() ? Storage::url($destination->galleries->first()->image) : Storage::url('assets/gallery/default.jpg') }}"
                                    class="img-fluid rounded-12">
                            </div>
                            <div class="col-lg-8 p-0 ps-lg-4">
                                <div class="d-flex justify-content-center align-items-center m-lg-0 mt-4">
                                    <h3 class="m-0 me-3 baseColor"><i class="fas fa-building"></i></h3>
                                    <h5 class="fw-bolder m-0">{{ $destination->title }}</h5>
                                </div>
                                <hr class="text-secondary">
                                <div class="row m-0 justify-content-sm-between">
                                    <div class="col-sm-3 m-sm-0 my-2 p-0">
                                        <p class="fw-bold">Check in</p>
                                        <p class="fw-bold my-1">{{ date('j F Y', strtotime($data->check_in)) }}</p>
                                        <p class="text-sm text-secondary">From 10.00 AM</p>
                                    </div>
                                    <div class="col-sm-3 m-sm-0 my-2 p-0">
                                        <p class="fw-bold">Check out</p>
                                        <p class="fw-bold my-1">{{ date('j F Y', strtotime($data->check_out)) }}</p>
                                        <p class="text-sm text-secondary">Before 2.00 PM</p>
                                    </div>
                                    <div class="col-sm-3 m-sm-0 my-2 p-0">
                                        <p class="fw-bold">Duration of stay</p>
                                        <p class="fw-bold my-1">{{ $data->duration }} night</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="text-secondary mt-4">
                        <h6 class="fw-bolder mb-4">{{ $data->rooms == 1 ? 'Single Room' : $data->rooms.' Rooms' }}</h6>
                        <div class="row m-0 justify-content-between align-items-center">
                            <div class="col-lg-5 p-0">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="fw-bold text-secondary">Total Guests</p>
                                    <p class="fw-bold">{{ $data->guests }} Guests</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold text-secondary">Trip Type</p>
                                    <p class="fw-bold">{{ $data->type_room }}</p>
                                </div>
                            </div>
                            <div class="col-lg-5 p-0 mt-lg-0 mt-4 text-center">
                                <img src="{{ $destination->galleries->skip(1)->count() ? Storage::url($destination->galleries->get(1)->image) : Storage::url('assets/gallery/default.jpg') }}"
                                    class="rounded-3 float-lg-end" width="60%">
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
                                {{ $data->transaction_total }}
                            </h6>
                        </div>
                        <hr class="mt-3 mb-4 text-secondary">
                        @for($i = 1; $i <= $data->rooms; $i++)
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <h6 class="fw-bold">(1x) {{ $destination->title }}, Single Room</h6>
                            <h6 class="fw-bold">$ {{ $destination->price }}</h6>
                        </div>
                        @endfor
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <h6 class="fw-bold">Duration ({{ $data->duration }} Nights)</h6>
                            <h6 class="fw-bold">$ {{ $data->durationPrice }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <h6 class="fw-bold">{{ $data->type_room }} (type)</h6>
                            <h6 class="fw-bold">$ {{ $data->typePrice }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bold">Taxes and Fees</h6>
                            <h6 class="fw-bold">$ {{ $data->roomPrice * 0.04 }}</h6>
                        </div>
                    </div>
                    <form action="{{ route('payment', $destination->slug) }}" method="post">
                        @csrf

                        <input type="hidden" name="travel_packages_id" id="travel_packages_id" value="{{ $destination->id }}">
                        <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="transaction_code" id="transaction_code" value="{{ "GF".mt_rand(1000,9999) }}">
                        <input type="hidden" name="name" id="name" value="{{ $data->name }}">
                        <input type="hidden" name="email" id="email" value="{{ $data->email }}">
                        <input type="hidden" name="phone_number" id="phone_number" value="{{ $data->phone_number }}">
                        <input type="hidden" name="check_in" id="check_in" value="{{ $data->check_in }}">
                        <input type="hidden" name="check_out" id="check_out" value="{{ $data->check_out }}">
                        <input type="hidden" name="rooms" id="rooms" value="{{ $data->rooms }}">
                        <input type="hidden" name="guests" id="guests" value="{{ $data->guests }}">
                        <input type="hidden" name="duration" id="duration" value="{{ $data->duration }}">
                        <input type="hidden" name="type_room" id="type_room" value="{{ $data->type_room }}">
                        <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $data->transaction_total }}">
                        <input type="hidden" name="transaction_status" id="transaction_status" value="PENDING">

                        <button type="submit"
                        class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">Continue to
                        Payment</button>

                        <button type="submit" formaction="{{ route('pay-later') }}" class="btn bg-secondary-light fw-bold text-white w-100 btnPayment rounded-6 mt-3">Pay Later
                        </button>
                    </button>
                    </form>
                </div>
                <p class="fw-bold mb-5 text-center">By clicking this button, you acknowledge that you have read and agreed to
                    the <a href="#" class="text-decoration-none baseColor">Terms & Conditions</a> and <a href="#"
                        class="text-decoration-none baseColor">Privacy Policy</a> of Gofest</p>
            </div>
            <div class="col-lg-5 p-0 ps-lg-5">
                <div class="contact mb-5">
                    <div class="p-4 rounded-12 bg-white">
                        <h5 class="fw-bolder m-0">Contact Details</h5>
                        <hr class="text-secondary">
                        <h6 class="fw-bold">{{ $data->name }}</h6>
                        <h6 class="fw-bold my-2">+{{ $data->phone_number }}</h6>
                        <h6 class="fw-bold">{{ $data->email }}</h6>
                    </div>
                </div>
                <div class="policy mb-5">
                    <div class="p-4 rounded-12 bg-white">
                        <h5 class="fw-bolder m-0">{{ $destination->type }} & Room Policy</h5>
                        <hr class="text-secondary">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="fw-bold themeColor me-3"><i class="fas fa-scroll"></i></h6>
                            <h6 class="fw-bold themeColor">Cancellation Policy</h6>
                        </div>
                        <p class="fw-bold text-secondary">This reservation is non-refundable.
                            Times displayed are based on the accommodation's local time. Stay period and room/unit type are non-changeable.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
