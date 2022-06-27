@extends('layouts.auth')

@section('title')
Send Payment
@endsection

@push('addonStyle')
<style>
    .p {
        font-size: 14px;
    }

</style>
@endpush

@section('content')
@if ($errors->any())
<div class="alert alert-danger m-0 py-3 text-center">
    @foreach ($errors->all() as $error)
    <h6 class="m-0 fw-bolder list-unstyled">{{ $error }}</h6>
    @endforeach
</div>
@endif
<div class="container mt-5">
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
                <div class="col-lg-12 p-0">
                    <div class="payment-info alert fade show mb-5 p-0">
                        <div class="rounded-12">
                            <ul class="nav nav-pills bg-white px-4 pt-4 pb-2" id="pills-tab" role="tablist" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link baseColor fw-bold px-4 py-2 active" id="lodging-tab"
                                        data-bs-toggle="pill" data-bs-target="#lodging" type="button" role="tab"
                                        aria-controls="lodging" aria-selected="true">
                                        <p>Lodgings</p>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link baseColor fw-bold px-4 py-2 mx-3" id="transportation-tab"
                                        data-bs-toggle="pill" data-bs-target="#transportation" type="button" role="tab"
                                        aria-controls="transportation" aria-selected="false">
                                        <p>Transportations</p>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="lodging" role="tabpanel"
                                    aria-labelledby="lodging-tab">
                                    <ul class="nav nav-pills mb-5 bg-white px-4 pb-4 pt-2" id="pills-tab" role="tablist" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link baseColor fw-bold px-4 py-2 active"
                                                id="lodging-bank-tab" data-bs-toggle="pill" data-bs-target="#lodging-bank"
                                                type="button" role="tab" aria-controls="lodging-bank"
                                                aria-selected="true">
                                                <p>Bank Payment</p>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link baseColor fw-bold px-4 py-2 mx-3"
                                                id="lodging-atm-tab" data-bs-toggle="pill"
                                                data-bs-target="#lodging-atm" type="button" role="tab"
                                                aria-controls="lodging-atm" aria-selected="false">
                                                <p>ATM</p>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link baseColor fw-bold px-4 py-2" id="lodging-credit-card-tab"
                                                data-bs-toggle="pill" data-bs-target="#lodging-credit-card" type="button"
                                                role="tab" aria-controls="lodging-credit-card" aria-selected="false">
                                                <p>Credit Card</p>
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="lodging-bank" role="tabpanel"
                                            aria-labelledby="lodging-bank-tab">
                                            <div class="row m-0 justify-content-lg-between justify-content-center">
                                                <div class="col-lg-7 p-0 bg-white p-4 rounded-12">
                                                    <h5 class="fw-bold mb-4">Bank Transfer</h5>
                                                    <div
                                                        class="p-3 d-flex align-items-center border-theme bgColor rounded-3 mb-4">
                                                        <h5 class="themeColor m-0 me-3"><i
                                                                class="fas fa-info-circle"></i></h5>
                                                        <p class="fw-bold text-white">You can transfer from any banking
                                                            channel
                                                            (m-banking, SMS
                                                            banking
                                                            or
                                                            ATM).</p>
                                                    </div>
                                                    <h6 class="fw-bold">Select a Bank Type</h6>
                                                    <form action="{{ route('retrieve.payment-lodging') }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="Mandiri"
                                                                    value="Mandiri">
                                                                <label class="form-check-label" for="Mandiri">
                                                                    <p class="fw-bold">Mandiri Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/mandiri.png') }}"
                                                                width="55">
                                                        </div>
                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="BCA"
                                                                    value="BCA">
                                                                <label class="form-check-label" for="BCA">
                                                                    <p class="fw-bold">BCA Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/bca.png') }}"
                                                                width="55">
                                                        </div>
                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="BRI"
                                                                    value="BRI">
                                                                <label class="form-check-label" for="BRI">
                                                                    <p class="fw-bold">BRI Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/bri.png') }}"
                                                                width="55">
                                                        </div>
                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 mt-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="BNI"
                                                                    value="BNI">
                                                                <label class="form-check-label" for="BNI">
                                                                    <p class="fw-bold">BNI Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/bni.png') }}"
                                                                width="55">
                                                        </div>
                                                </div>
                                                <div class="col-lg-4 p-0 mt-lg-0 mt-5">
                                                    <div class="bg-white p-4 rounded-12">
                                                        <input type="hidden" name="type" id="type" value="Bank Transfer">
                                                        <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                                                        <input type="file" name="image" id="image"
                                                        class="form-control text-sm bg-white border py-3 px-4 rounded-12 mb-3 shadow-none fw-bold"
                                                        required>
                                                        <select name="transaction_travel_packages_id"
                                                            id="transaction_travel_packages_id"
                                                            class="form-select text-sm bg-white border py-3 px-4 shadow-none rounded-12 fw-bold" required>
                                                            <option value="" selected disabled hidden>Select Transaction</option>
                                                            @foreach ($destinations as $data)
                                                            <option value="{{ $data->id }}">
                                                                #{{ $data->transaction_code }} - {{ $data->travel_package->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <button type="submit"
                                                            class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6 my-4">
                                                            <p>Send with Bank Transfer</p>
                                                        </button>
                                                        </form>
                                                        <p class="fw-bold text-center text-sm">By clicking this button, you
                                                            acknowledge
                                                            that you
                                                            have read
                                                            and agreed to
                                                            the <a href="#" class="text-decoration-none baseColor">Terms &
                                                                Conditions</a>
                                                            and <a href="#" class="text-decoration-none baseColor">Privacy
                                                                Policy</a> of
                                                            Gofest</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="lodging-atm" role="tabpanel"
                                            aria-labelledby="lodging-atm-tab">
                                            <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                                        </div>
                                        <div class="tab-pane fade" id="lodging-credit-card" role="tabpanel"
                                            aria-labelledby="lodging-credit-card-tab">
                                            <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="transportation" role="tabpanel"
                                    aria-labelledby="transportation-tab">
                                    <ul class="nav nav-pills mb-5 bg-white px-4 pb-4 pt-2" id="pills-tab" role="tablist" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link baseColor fw-bold px-4 py-2 active"
                                                id="transportation-bank-tab" data-bs-toggle="pill" data-bs-target="#transportation-bank"
                                                type="button" role="tab" aria-controls="transportation-bank"
                                                aria-selected="true">
                                                <p>Bank Payment</p>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link baseColor fw-bold px-4 py-2 mx-3"
                                                id="transportation-atm-tab" data-bs-toggle="pill"
                                                data-bs-target="#transportation-atm" type="button" role="tab"
                                                aria-controls="transportation-atm" aria-selected="false">
                                                <p>ATM</p>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link baseColor fw-bold px-4 py-2" id="transportation-credit-card-tab"
                                                data-bs-toggle="pill" data-bs-target="#transportation-credit-card" type="button"
                                                role="tab" aria-controls="transportation-credit-card" aria-selected="false">
                                                <p>Credit Card</p>
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="transportation-bank" role="tabpanel"
                                            aria-labelledby="transportation-bank-tab">
                                            <div class="row m-0 justify-content-lg-between justify-content-center">
                                                <div class="col-lg-7 p-0 bg-white p-4 rounded-12">
                                                    <h5 class="fw-bold mb-4">Bank Transfer</h5>
                                                    <div
                                                        class="p-3 d-flex align-items-center border-theme bgColor rounded-3 mb-4">
                                                        <h5 class="themeColor m-0 me-3"><i
                                                                class="fas fa-info-circle"></i></h5>
                                                        <p class="fw-bold text-white">You can transfer from any banking
                                                            channel
                                                            (m-banking, SMS
                                                            banking
                                                            or
                                                            ATM).</p>
                                                    </div>
                                                    <h6 class="fw-bold">Select a Bank Type</h6>
                                                    <form action="{{ route('retrieve.payment-transportation') }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="Mandiri"
                                                                    value="Mandiri">
                                                                <label class="form-check-label" for="Mandiri">
                                                                    <p class="fw-bold">Mandiri Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/mandiri.png') }}"
                                                                width="55">
                                                        </div>
                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="BCA"
                                                                    value="BCA">
                                                                <label class="form-check-label" for="BCA">
                                                                    <p class="fw-bold">BCA Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/bca.png') }}"
                                                                width="55">
                                                        </div>
                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="BRI"
                                                                    value="BRI">
                                                                <label class="form-check-label" for="BRI">
                                                                    <p class="fw-bold">BRI Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/bri.png') }}"
                                                                width="55">
                                                        </div>
                                                        <div
                                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 mt-3">
                                                            <div class="form-check m-0">
                                                                <input
                                                                    class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                    type="radio" name="name" id="BNI"
                                                                    value="BNI">
                                                                <label class="form-check-label" for="BNI">
                                                                    <p class="fw-bold">BNI Transfer</p>
                                                                </label>
                                                            </div>
                                                            <img src="{{ url('frontend/images/banks/bni.png') }}"
                                                                width="55">
                                                        </div>
                                                </div>
                                                <div class="col-lg-4 p-0 mt-lg-0 mt-5">
                                                    <div class="bg-white p-4 rounded-12">
                                                        <input type="hidden" name="type" id="type" value="Bank Transfer">
                                                        <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                                                        <input type="file" name="image" id="image"
                                                        class="form-control text-sm bg-white border py-3 px-4 rounded-12 mb-3 shadow-none fw-bold"
                                                        required>
                                                        <select name="transaction_transportations_id"
                                                            id="transaction_transportations_id"
                                                            class="form-select text-sm bg-white border py-3 px-4 shadow-none rounded-12 fw-bold">
                                                            <option value="" selected disabled hidden>Select Transaction</option>
                                                            @foreach ($transportations as $data)
                                                            <option value="{{ $data->id }}">
                                                                #{{ $data->transaction_code }} - {{ $data->transportation->company_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <button type="submit"
                                                            class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6 my-4">
                                                            <p>Send with Bank Transfer</p>
                                                        </button>
                                                        </form>
                                                        <p class="fw-bold text-center text-sm">By clicking this button, you
                                                            acknowledge
                                                            that you
                                                            have read
                                                            and agreed to
                                                            the <a href="#" class="text-decoration-none baseColor">Terms &
                                                                Conditions</a>
                                                            and <a href="#" class="text-decoration-none baseColor">Privacy
                                                                Policy</a> of
                                                            Gofest</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="transportation-atm" role="tabpanel"
                                            aria-labelledby="transportation-atm-tab">
                                            <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                                        </div>
                                        <div class="tab-pane fade" id="transportation-credit-card" role="tabpanel"
                                            aria-labelledby="transportation-credit-card-tab">
                                            <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-5 p-0 ps-lg-5">
                    <div class="notice mb-5 p-0">
                        <div class="p-4 rounded-12 bg-white">
                            <h5 class="fw-bolder m-0">Confirm Payment</h5>
                            <hr class="text-secondary">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
