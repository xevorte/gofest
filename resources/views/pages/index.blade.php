@extends('layouts.app')

@section('title')
Gofest | Travel With Us
@endsection

@push('addonStyle')
    <style>
        input,
        input:focus,
        select {
            background: #ffffff !important;
        }
    </style>
@endpush

@if(session()->has('profile'))
<?= "<script>alert('" . session()->get('profile') ."');</script>"; ?>
@endif

@section('content')
{{-- Hero --}}
<section class="hero text-center d-flex align-items-center justify-content-center">
    <div class="content">
        <h1 class="text-white fw-bolder m-0 px-2 display-4">Explore New <span class="baseColor fw-bolder">Place</span>
            With Us</h1>
        <p class="text-white">We help you to choose the property that suits your wishes easily, quickly,
            and at an
            affordable price also provide a complete service for the sale or rental of real states</p>
        <div class="btn-hero d-flex flex-wrap justify-content-center">
            <a href="#" class="btn bgColor bgHover text-white">Get Started</a>
            <a href="#" class="btn bg-white text-base">Learn More</a>
        </div>
    </div>
</section>
{{-- End Hero --}}

{{-- Search --}}
<section class="search row justify-content-center mx-0">
    <div class="col-lg-10 col-10 p-0">
        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
            <button class="btn bgColor tab-heading" data-bs-toggle="pill" data-bs-target="#sale" type="button"
                role="tab">Online Booking</button>
        </ul>
        <form action="" method="post">
            <div class="tab-content bg-white" id="pills-tabContent">
                <div class="tab-pane fade show active" id="sale" role="tabpanel">
                    <div class="row m-0 justify-content-evenly align-items-center">
                        <div class="col-lg-2 p-0">
                            <label class="form-label d-flex align-items-center" for="lokasi">
                                <span class="text-sm me-2 baseColor"><i class="fas fa-map-marker-alt"></i></span>
                                <label>Location</label>
                            </label>
                            <select name="lokasi" id="lokasi" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>Select Your Destination</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Germany">Germany</option>
                            </select>
                        </div>
                        <div class="col-lg-2 p-0 my-4 my-lg-0">
                            <label class="form-label d-flex align-items-center" for="type">
                                <span class="text-sm me-2 baseColor"><i class="fas fa-building"></i></span>
                                <label>Type</label>
                            </label>
                            <select name="type" id="type" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>Select Type</option>
                                <option value="Hotel">Hotel</option>
                                <option value="Hostel">Hostel</option>
                                <option value="Apartments">Apartments</option>
                            </select>
                        </div>
                        <div class="col-lg-2 p-0 mb-4 mb-lg-0">
                            <label class="form-label d-flex align-items-center" for="duration">
                                <span class="text-sm me-2 baseColor"><i class="fas fa-cloud-moon"></i></span>
                                <label>Duration</label>
                            </label>
                            <select name="duration" id="duration" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>1 Night</option>
                                @for($i = 1; $i <= 30; $i++)
                                <option value="{{ $i }}">
                                    {{ $i }} Night ({{ date('D, j F Y', strtotime("+$i days")) }})
                                </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-2 p-0">
                            <label class="form-label d-flex align-items-center" for="lokasi">
                                <span class="text-sm me-2 baseColor"><i class="fas fa-users"></i></span>
                                <label>Total Person</label>
                            </label>
                            <select name="lokasi" id="lokasi" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>How Many People</option>
                                <option value="One">1 Traveler</option>
                                <option value="Two">2 Travelers</option>
                                <option value="Three">3 Travelers</option>
                                <option value="Four">4 Travelers</option>
                            </select>
                        </div>
                        <div class="col-lg-1 d-flex justify-content-end p-0 mt-4 mt-lg-0">
                            <button type="submit" name="sale" class="btn bgColor bgHover text-white py-3 w-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
{{-- End Search --}}

{{-- Properties --}}
<section class="properties container">
    <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="mb-3">
            <p class="themeColor">Discover Lodging</p>
            <h2 class="fw-bolder mt-2">Discover Popular <br>Destination For You</h2>
        </div>
        <div class="deskripsi">
            <p class="baseColor fw-bold">We provide the best properties of the best with the best service, explore our
                property until you are <span class="themeColor">satisfied</span></p>
            <a href="#" class="btn btn-outline-base fw-bold py-2 px-4 mt-3">
                <p>Show More</p>
            </a>
        </div>
    </div>
    <div class="properties-list d-flex py-4">
        @foreach ($travels as $travel)
        <div class="card border-0 property">
            <div class="m-2 mb-1 border-0 position-relative">
                <div class="card-img-top" style="background-image: url('{{ $travel->galleries->count() ? Storage::url($travel->galleries->first()->image) : Storage::url('assets/gallery/default.jpg') }}')"></div>
            </div>
            <div class="card-body pt-2 d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="rating d-flex">
                        <p class="baseColor m-0 text-sm"><i class="fas fa-star"></i></p>
                        <p class="baseColor text-sm text-base fw-bold ms-2" style="margin-top: 0.6px;">{{ $travel->rating }}</p>
                        <p class="text-secondary text-sm fw-bold" style="margin-top: 0.6px;">({{ $travel->review->count() }})</p>
                    </div>
                    <div class="d-flex align-items-center my-3">
                        <p class="text-sm baseColor m-0"><i class="fas fa-building"></i></p>
                        <p class="text-sm text-bolder text-secondary ms-2">{{ $travel->type }}</p>
                    </div>
                </div>
                <h5 class="card-title text-base fw-bold m-0">{{ $travel->title }}</h5>
                <div class="d-flex align-items-center">
                    <p class="text-sm text-secondary"><i class="fas fa-map-marker-alt"></i></p>
                    <p class="text-sm text-secondary ms-2">{{ $travel->city }}, {{ $travel->area }}, {{ $travel->country }}</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-bolder baseColor m-0">${{ $travel->price }} <span class="text-secondary text-sm">/ Room</span></h6>
                    <a href="/destinations/{{ Str::lower($travel->country) }}/{{ Str::lower($travel->type) }}/{{ $travel->slug }}" class="btn btn-outline-base px-4 shadow-none">
                        <p class="fw-bold">See Detail</p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
{{-- End Properties --}}

{{-- Transportation --}}
<section class="properties container">
    <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="mb-3">
            <p class="themeColor">Discover Transport</p>
            <h2 class="fw-bolder mt-2">Best Transportation <br>To Complete Your Trip</h2>
        </div>
    </div>
    <div class="properties-list d-flex py-4">
        @foreach ($transportations as $data)
        <div class="property transport border">
            <p class="m-0 fw-bold text-center {{ $data->status == 'Available' ? 'bgTheme' : 'bg-danger' }} py-1 text-white">{{ $data->status }}</p>
            <div class="d-flex align-items-center p-2">
                <div class="m-2 mb-1 border-0 position-relative w-50 pb-1">
                    <div class="card-img-top" style="background-image: url('{{ Storage::url($data->image) }}'); height: 120px;"></div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-base fw-bolder m-0">{{ $data->company_name }}</h5>
                    <p class="text-sm fw-bold text-secondary mt-2 mb-3">{{ $data->type }}</p>
                    <a href="/transportations/{{ Str::lower($data->type) }}/{{ $data->slug }}" class="btn bgColor bgHover text-white w-100 {{ $data->status == 'Unavailable' ? 'disabled' : '' }}">
                        <p class="fw-bold">Details</p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center">
        <a href="#" class="btn btn-outline-base fw-bold py-2 px-5 mt-3">
            <p>Show More</p>
        </a>
    </div>
</section>
{{-- End Transportation --}}

{{-- Offer --}}
<section class="offer container">
    <div class="row m-0 justify-content-between align-items-center">
        <div class="col-lg-5 order-lg-first order-last m-0 mt-5">
            <p class="themeColor">Exclusive Offer</p>
            <h2 class="fw-bolder mt-2 mb-3">Take The Best Vacation <br>And Enjoy Your Place</h2>
            <p>Travel is the movement of people between distant geographical locations. Travel can be done by foot,
                bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can
                be one way or round trip.</p>
            <div class="d-flex flex-wrap align-items-center mt-3">
                <button class="btn bgColor bgHover text-white fw-bold mt-4">
                    Book Now
                </button>
                <img src="{{ url('frontend/images/ppl.png') }}" width="160" class="mt-4">
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end position-relative">
            <img src="{{ url('frontend/images/traveler2.png') }}" class="img-fluid">
        </div>
    </div>
</section>
{{-- End Offer --}}

{{-- Services --}}
<section class="service bgColor text-white position-relative">
    <div
        class="statistic d-flex position-absolute justify-content-evenly align-items-center bg-white py-5 text-center baseColor">
        <div class="mx-2">
            <h1 class="fw-bolder">25k+</h1>
            <p class="fw-bold">Satisfied Traveler</p>
        </div>
        <div class="mx-2">
            <h1 class="fw-bolder">7k+</h1>
            <p class="fw-bold">Successful Tours</p>
        </div>
        <div class="mx-2">
            <h1 class="fw-bolder">14+</h1>
            <p class="fw-bold">Year Experiences</p>
        </div>
    </div>
    <div class="container">
        <div class="row m-0 justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-6 p-0 pb-5 order-lg-first order-last description">
                <p class="themeColor">Best Service</p>
                <h2 class="fw-bolder m-0 mt-2 mb-4">We Always Try To Give You <br>Our Best Service</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda natus, saepe, dicta eaque nisi
                    laborum vel ex ipsam accusantium qui commodi, itaque dolores facere quidem magni asperiores rem
                    reiciendis quod quo! Autem ea quis suscipit recusandae est totam distinctio modi, beatae ad, natus,
                    iure nobis. Rem recusandae maxime ipsum quisquam!</p>
            </div>
            <div class="col-lg-5 col-sm-8 col-10 p-0 py-2">
                <img src="{{ url('frontend/images/services.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
</section>
{{-- End Services --}}

{{-- Testimonials --}}
<section class="testimonials container">
    <p class="themeColor text-center">Testimonials</p>
    <h2 class="fw-bolder mt-2 text-center">What People Say About Us</h2>

    <div class="reviews-container position-relative">
        <div class="review fade-animation">
            <div class="row m-0 justify-content-lg-evenly justify-content-center">
                @foreach ($testimonials as $testimonial)
                <div class="col-lg-3 col-md-8 col-11 p-0 my-5">
                    <div class="card p-0 position-relative">
                        <img src="{{ $testimonial->user->image == null ? Storage::url('assets/user_image/user.png') : Storage::url($testimonial->user->image) }}" class="position-absolute rounded-circle">
                        <div class="card-body pb-3 px-4">
                            <p class="text-sm">{{ $testimonial->description }}</p>
                        </div>
                        <hr class="text-secondary">
                        <div class="card-body pt-0 pb-3 px-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bolder">{{ $testimonial->user->name }}</p>
                                    <p class="text-sm text-secondary mt-1">{{ $testimonial->user->job }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <p class="text-sm baseColor ms-1"><i class="fas fa-star"></i></p>
                                        @else
                                            <p class="text-sm text-secondary-light ms-1"><i class="fas fa-star"></i></p>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{ $testimonials->onEachSide(3)->links('vendor.pagination.custom') }}

        {{-- <a class="prev text-decoration-none btn-outline-base fw-bolder" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next text-decoration-none btn-outline-base fw-bolder" onclick="plusSlides(1)">&#10095;</a> --}}
    </div>

    {{-- <div class="text-center">
        <span class="dot mx-2" onclick="currentSlide(1)"></span>
        <span class="dot mx-2" onclick="currentSlide(2)"></span>
        <span class="dot mx-2" onclick="currentSlide(3)"></span>
        <span class="dot mx-2" onclick="currentSlide(4)"></span>
    </div> --}}
</section>
{{-- End Testimonials --}}

{{-- Partners --}}
<section class="partners container">
    <h3 class="fw-bolder baseColor text-center">Trusted By Many Companies</h3>
    <div class="row justify-content-center m-0 mt-4">
        <div class="col-lg-10 p-0">
            <img src="{{ url('frontend/images/partners.png') }}" class="img-fluid">
        </div>
    </div>
</section>
{{-- End Partners --}}
@endsection

@push('addonScript')
<script>
    let slideIndex = 1;

    $nav.toggleClass('scrolled', $(this).scrollTop() > $hero.height());
    $(function () {
        $(document).scroll(function () {
            $nav.toggleClass('scrolled', $(this).scrollTop() > $hero.height());
        });
    });

    // showSlides(slideIndex);

    // function plusSlides(n) {
    //     showSlides(slideIndex += n);
    // }

    // function currentSlide(n) {
    //     showSlides(slideIndex = n);
    // }

    // function showSlides(n) {
    //     let i;
    //     let slides = document.getElementsByClassName("review");
    //     let dots = document.getElementsByClassName("dot");
    //     if (n > slides.length) {
    //         slideIndex = 1
    //     }
    //     if (n < 1) {
    //         slideIndex = slides.length
    //     }
    //     for (i = 0; i < slides.length; i++) {
    //         slides[i].style.display = "none";
    //     }
    //     for (i = 0; i < dots.length; i++) {
    //         dots[i].className = dots[i].className.replace(" active", "");
    //     }
    //     slides[slideIndex - 1].style.display = "block";
    //     dots[slideIndex - 1].className += " active";
    // }

</script>
@endpush
