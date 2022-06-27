@extends('layouts.app')

@section('title')
Gofest | {{ $detail->country }}, {{ $detail->type }}, {{ $detail->title }}
@endsection

@push('addonStyle')
<style>
    body,
    input,
    input:focus,
    select {
        background: #f2f0ff !important;
    }

    .detail-page {
        margin-top: 120px;
    }

    .bg-lightning {
        background-color: rgb(216, 220, 230);
    }

</style>
@endpush

@section('content')
<section class="container detail-page">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">
                <a href="{{ url('/') }}" class="text-decoration-none baseColor" style="font-size: 14px;">Home</a>
            </li>
            <li class="breadcrumb-item fw-bold" aria-current="page">
                <a href="{{ url('/') }}" class="text-decoration-none baseColor"
                    style="font-size: 14px;">Destinations</a>
            </li>
            <li class="breadcrumb-item fw-bold" aria-current="page">
                <a href="{{ url('/') }}" class="text-decoration-none baseColor"
                    style="font-size: 14px;">{{ $detail->country }}</a>
            </li>
            <li class="breadcrumb-item fw-bold" aria-current="page">
                <a href="{{ url('/') }}" class="text-decoration-none baseColor"
                    style="font-size: 14px;">{{ $detail->type }}</a>
            </li>
            <li class="breadcrumb-item fw-bold" aria-current="page">
                <a href="{{ url('/') }}" class="text-decoration-none text-base"
                    style="font-size: 14px;">{{ $detail->title }}</a>
            </li>
        </ol>
    </nav>
    <div class="row m-0 my-5 justify-content-between">
        <div class="travel-detail col-lg-6 p-0">
            <div class="card border-0 rounded-12 p-lg-5 p-4">
                <div class="card-body">
                    <div class="travel-title mb-4">
                        <h2 class="fw-bolder baseColor mb-3">{{ $detail->title }}</h2>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <p class="text-secondary"><i class="fas fa-map-marker-alt"></i></p>
                                <p class="fw-bold text-secondary ms-2">{{ $detail->city }}, {{ $detail->area }},
                                    {{ $detail->country }}</p>
                            </div>
                            <p class="bgColor text-white fw-bold m-0 rounded-pill"
                                style="padding: 3px 1.4em 4px 1.4em;">{{ $detail->type }}</p>
                        </div>
                    </div>
                    <div class="gallery">
                        @if($detail->galleries->count())
                        <img src="{{ Storage::url($detail->galleries->first()->image) }}" class="img-thumb">
                        <div class="thumbnails d-flex justify-content-between mt-4 w-100">
                            @foreach ($detail->galleries()->paginate(5) as $gallery)
                            <img src="{{ Storage::url($gallery->image) }}" class="img-mini">
                            @endforeach
                        </div>
                        @else
                        <img src="{{ Storage::url('assets/gallery/default.jpg') }}" class="img-thumb">
                        <div class="thumbnails d-flex justify-content-between mt-4 w-100">
                            <img src="{{ Storage::url('assets/gallery/default.jpg') }}" class="img-mini">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="description bg-white mt-5 p-5 rounded-12">
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-secondary fw-bold px-4" id="pills-home-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                            aria-controls="pills-home" aria-selected="true">About</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-secondary fw-bold px-4" id="pills-profile-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Facilities</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-secondary fw-bold px-4" id="pills-contact-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <p>{{ $detail->description }}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row m-0 mt-4 align-items-center">
                            @if($detail->restaurant == 1)
                            <div class="col-md-4 col-sm-6 d-flex align-items-center my-3 p-0">
                                <div class="d-flex align-items-center">
                                    <h3 class="baseColor"><i class="fas fa-utensils"></i></h3>
                                    <h6 class="text-base mb-1 fw-bold ms-3">Restaurant</h6>
                                </div>
                            </div>
                            @endif
                            @if($detail->wifi == 1)
                            <div class="col-md-4 col-sm-6 d-flex align-items-center my-3 p-0">
                                <div class="d-flex align-items-center">
                                    <h3 class="baseColor"><i class="fas fa-wifi"></i></h3>
                                    <h6 class="text-base mb-1 fw-bold ms-3">Wifi</h6>
                                </div>
                            </div>
                            @endif
                            @if($detail->elevator == 1)
                            <div class="col-md-4 col-sm-6 d-flex align-items-center my-3 p-0">
                                <div class="d-flex align-items-center">
                                    <h3 class="baseColor"><i class="fas fa-grip-vertical"></i></h3>
                                    <h6 class="text-base mb-1 fw-bold ms-3">Elevator</h6>
                                </div>
                            </div>
                            @endif
                            @if($detail->parking == 1)
                            <div class="col-md-4 col-sm-6 d-flex align-items-center my-3 p-0">
                                <div class="d-flex align-items-center">
                                    <h3 class="baseColor"><i class="fas fa-warehouse"></i></h3>
                                    <h6 class="text-base mb-1 fw-bold ms-3">Parking</h6>
                                </div>
                            </div>
                            @endif
                            @if($detail->breakfast == 1)
                            <div class="col-md-4 col-sm-6 d-flex align-items-center my-3 p-0">
                                <div class="d-flex align-items-center">
                                    <h3 class="baseColor"><i class="fas fa-coffee"></i></h3>
                                    <h6 class="text-base mb-1 fw-bold ms-3">Breakfast</h6>
                                </div>
                            </div>
                            @endif
                            @if($detail->laundry == 1)
                            <div class="col-md-4 col-sm-6 d-flex align-items-center my-3 p-0">
                                <div class="d-flex align-items-center">
                                    <h3 class="baseColor"><i class="fas fa-soap"></i></h3>
                                    <h6 class="text-base mb-1 fw-bold ms-3">Laundry</h6>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        @if($detail->review->count())
                        @foreach ($detail->review()->paginate(2) as $testimonial)
                        <div class="review my-4">
                            <div class="d-flex align-items-center">
                                @for($i = 1; $i <= 5; $i++) @if($i <= $testimonial->rating)
                                    <p class="text-warning text-sm me-1"><i class="fas fa-star"></i></p>
                                    @else
                                    <p class="text-secondary-light text-sm me-1"><i class="fas fa-star"></i></p>
                                    @endif
                                    @endfor
                            </div>
                            <p class="text-base fw-bolder my-2">{{ $testimonial->title }}</p>
                            <p class="text-secondary text-sm">{{ Str::limit($testimonial->description, 80, '...') }}</p>
                        </div>
                        @endforeach
                        <a href="#" class="btn rounded-12 text-white fw-bold py-2 w-100 bgColor bgHover">
                            <p>Read More</p>
                        </a>
                        @else
                        <h6 class="mb-4 mt-5 text-center text-secondary">No Reviews</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction col-lg-5 p-0 m-lg-0 mt-5">
            <div class="card border-0 rounded-12 mb-5 p-0">
                <div class="w-100 bgColor text-center py-3 members">
                    <h5 class="text-white fw-bold m-0">Members Are Going</h5>
                </div>
                <div class="card-body transaction-detail">
                    <div class="d-flex align-items-center justify-content-center">
                        @foreach ($members as $member)
                        <img src="{{ $member->image == null ? Storage::url('assets/user_image/user.png') : Storage::url($member->image) }}" width="50" class="rounded-circle mx-2">
                        @endforeach
                    </div>
                    <hr class="text-secondary my-4">
                    <h5 class="mb-4 fw-bold baseColor">Trip Information</h5>
                    <form action="{{ route('fill-in-data', $detail->slug) }}" method="post">
                        @csrf

                        <div class="row align-items-center justify-content-between m-0 p-0 my-4">
                            <div class="col-md-6 pe-md-2 p-0">
                                <div class="form-group">
                                    <label for="check_in" class="form-label fw-bold text-base">
                                        <p>Date Of Departure</p>
                                    </label>
                                    <input type="text" onfocus="(this.type='date')" id="check_in" name="check_in"
                                        class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                        placeholder="Select Date" required>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-2 mt-md-0 mt-4 p-0">
                                <div class="form-group">
                                    <label for="duration" class="form-label fw-bold text-base">
                                        <p>Duration</p>
                                    </label>
                                    <input type="number" id="duration" name="duration"
                                        class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                        placeholder="How Many Days" required>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between m-0 p-0 my-4">
                            <div class="col-md-6 pe-md-2 p-0">
                                <div class="form-group">
                                    <label for="rooms" class="form-label fw-bold text-base">
                                        <p>Rooms</p>
                                    </label>
                                    <input type="number" id="rooms" name="rooms"
                                        class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                        placeholder="Choose Room" required>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-2 mt-md-0 mt-4 p-0">
                                <div class="form-group">
                                    <label for="guests" class="form-label fw-bold text-base">
                                        <p>Guest</p>
                                    </label>
                                    <input type="number" id="guests" name="guests"
                                        class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                        placeholder="How Many Guests" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_room" class="form-label fw-bold text-base">
                                <p>Type Of Room</p>
                            </label>
                            <select name="type_room" id="type_room"
                                class="form-select py-2 px-3 mt-1 shadow-none text-secondary" required>
                                <option selected disabled hidden>Select Type</option>
                                <option value="Standard Room">Standard Room</option>
                                <option value="Deluxe Room">Deluxe Room</option>
                                <option value="Suite Room">Suite Room</option>
                            </select>
                        </div>
                </div>
                @guest
                <a href="{{ route('login') }}" class="btn shadow-none w-100 text-center py-3 btn-transaction">
                    <h5 class="text-white fw-bold m-0">Register or Login to Continue</h5>
                </a>
                @endguest
                @auth
                <button type="submit" class="btn shadow-none w-100 text-center py-3 btn-transaction">
                    <h5 class="text-white fw-bold m-0">Book Now</h5>
                </button>
                @endauth
                </form>
            </div>
            <div class="map p-4 rounded-12 bg-white">
                <p class="text-center baseColor fw-bold"><span class="me-2"><i
                            class="fas fa-map-marker-alt"></i></span>View On Google Maps</p>
                <div class="ratio mt-3" style="height: 260px">
                    <iframe
                        src="https://maps.google.com/maps?q=-6.463606742076474, 106.87762741040046&hl=id&z=14&amp;output=embed"
                        class="border-0 rounded-12" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <h5 class="fw-bolder text-base mb-lg-5 pt-4">Related Travel</h5>
    <div class="row m-0 related justify-content-lg-between justify-content-center">
        @if($similars->skip(1)->count() == 1)
        @foreach ($similars->skip(1) as $similar)
        <div class="col-lg-3 col-md-10 m-lg-0 my-4 p-0">
            <div class="card p-3 rounded-12 border-0 property" , style="height: 380px">
                <div class="m-2 mb-1 border-0 position-relative">
                    <div class="card-img-top" style="background-image: url({{ url('frontend/images/location1.jpg') }})">
                    </div>
                </div>
                <div class="card-body p-2 d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="rating d-flex">
                            <p class="baseColor m-0 text-sm"><i class="fas fa-star"></i></p>
                            <p class="baseColor text-sm text-base fw-bold ms-2" style="margin-top: 0.6px;">
                                {{ $similar->rating }}</p>
                            <p class="text-secondary text-sm fw-bold" style="margin-top: 0.6px;">
                                ({{ $similar->review->count() }})</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="text-sm baseColor m-0"><i class="fas fa-building"></i></p>
                            <p class="text-sm text-bolder text-secondary ms-2">{{ $similar->type }}</p>
                        </div>
                    </div>
                    <h5 class="card-title text-base fw-bold m-0">{{ $similar->title }}</h5>
                    <div class="d-flex align-items-center">
                        <p class="text-sm text-secondary"><i class="fas fa-map-marker-alt"></i></p>
                        <p class="text-sm text-secondary ms-2">{{ $similar->city }}, {{ $similar->area }},
                            {{ $similar->country }}</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-bolder baseColor m-0">${{ $similar->price }} <span
                                class="text-secondary text-sm">/Person</span></h6>
                        <a href="#" class="btn btn-outline-base px-4">
                            <p class="fw-bold">See Detail</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h5 class="fw-bolder m-0 mt-4 text-danger text-center">No Similar Properties</h5>
        @endif
    </div>
</section>
@endsection

@push('addonScript')
<script>
    document.querySelector('.navbar-expand-lg').classList.add('scrolled');

    let galleries = document.querySelector('.thumbnails');
    let galleryThumb = document.querySelector('.img-thumb');
    let galleryMini = Array.from(document.querySelectorAll('.img-mini'));
    galleryMini.filter(e => e.src == galleryThumb.src).map(e => e.classList.add('active'));

    galleries.addEventListener('click', e => {
        if (e.target.className == 'img-mini') {
            galleryThumb.src = e.target.src;
            galleryThumb.classList.add('fade');

            galleryMini.map(e => e.className = 'img-mini');

            e.target.classList.add('active');

            setTimeout(() => {
                galleryThumb.classList.remove('fade');
            }, 500);
        }
    });

</script>
@endpush
