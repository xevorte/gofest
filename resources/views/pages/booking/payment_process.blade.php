@extends('layouts.booking')

@section('title')
Book {{ $destination->title }}
@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="title mb-5">
            <h2 class="fw-bolder mb-3">Transfer Payment Instructions</h2>
            <h6 class="fw-bold">Let's follow the steps below to send payment</h6>
        </div>
    </div>
</div>
<div class="row m-0 justify-content-center">
    <div class="col-lg-10 p-0">
        <div class="row m-0 justify-content-lg-between justify-content-center">
            <div class="col-lg-7 p-0">
                <div class="info alert fade show mb-5 p-0">
                    <h5 class="fw-bolder mb-3">Please Make a Payment Before</h5>
                    <div class="p-4 rounded-12 bg-white">
                        <h6 class="fw-bold themeColor">Today 11.00 PM</h6>
                        <p class="fw-bold text-secondary">Complete your payment before we close the service</p>
                    </div>
                </div>
                <div class="payment-info alert fade show mb-5 p-0">
                    <h5 class="fw-bolder mb-3">Please Transfer to : </h5>
                    <div class="rounded-12 bg-white overflow-hidden">
                        <div class="p-3 px-4 pb-2 d-flex align-items-center justify-content-between">
                            <h6 class="fw-bold m-0 mt-1">{{ $data->payment_name }}</h6>
                            <img src="{{ url('frontend/images/banks/'. $data->payment_name .'.png') }}"
                                width="60">
                        </div>
                        <hr class="border-2 mt-0">
                        <div class="p-4">
                            <div class="row m-0">
                                <div class="col-lg-5 p-0">
                                    <p class="fw-bold text-secondary">Account Number</p>
                                </div>
                                <div class="col-lg-6 p-0 mt-lg-0 mt-2">
                                    <p class="fw-bold">1120.01.000062.30.5</p>
                                </div>
                            </div>
                            <div class="row m-0 mt-3">
                                <div class="col-lg-5 p-0">
                                    <p class="fw-bold text-secondary">Account Name</p>
                                </div>
                                <div class="col-lg-6 p-0 mt-lg-0 mt-2">
                                    <p class="fw-bold">PT. GOFEST WorldIndo</p>
                                    <p class="fw-bold text-secondary">Admin Irham</p>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 mt-3 p-4 bgColor text-white">
                            <div class="col-lg-5 p-0">
                                <p class="fw-bold">Transfer Amount</p>
                            </div>
                            <div class="col-lg-6 p-0 mt-lg-0 mt-2">
                                <p class="fw-bold themeColor">Rp.
                                    {{ number_format($datas->transaction_total * 14000, 0, '', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="completed alert fade show mb-5 p-0">
                    <h5 class="fw-bolder mb-3">Have Completed Payment</h5>
                    <div class="p-4 rounded-12 bg-white">
                        <p class="fw-bold text-secondary mb-3">Once your payment is completed, we will send your
                            {{ $destination->type }} voucher to your email address and your phone number</p>
                        <form action="{{ route('checkout-destination') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="users_id" id="users_id"
                                value="{{ Auth::user()->id }}">
                            <input type="hidden" name="transaction_travel_packages_id" id="transaction_travel_packages_id"
                                value="{{ $datas->id }}">
                            <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg" class="form-control border px-4 py-3 rounded-12 fw-bold text-sm" required>
                            <input type="hidden" name="name" id="name"
                                value="{{ $data->payment_name }}">
                                <input type="hidden" name="type" id="type"
                                value="{{ $data->payment_type }}">

                            <button type="submit"
                                class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6 mt-4">
                                <p>I Have Completed Payment</p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-5">
                <div class="notice mb-5 p-0">
                    <div class="p-4 rounded-12 bg-white">
                        <h5 class="fw-bolder m-0">Booking Details</h5>
                        <hr class="text-secondary">
                        <h6 class="fw-bold baseColor mb-2">{{ $destination->title }}</h6>
                        <p class="fw-bold my-1">{{ date('l, F j, Y', strtotime($datas->check_in)) }}</p>
                        <p class="fw-bold my-1">{{ $datas->duration == 1 ? ' Single Night' : $datas->duration.' Nights' }}</p>
                        <p class="fw-bold my-1">{{ $datas->rooms == 1 ? 'Single Room' : $datas->rooms.' Rooms' }}</p>
                        <p class="fw-bold my-1">{{ $datas->guests == 1 ? 'Single Guest' : $datas->guests .' Guests' }}</p>
                        <hr class="text-secondary mt-4">
                        <h5 class="fw-bolder mb-2">Guest Details</h5>
                        <p class="fw-bold my-1">{{ $datas->name }}</p>
                        <p class="fw-bold my-1">{{ $datas->email }}</p>
                        <p class="fw-bold my-1">+{{ $datas->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
