@extends('layouts.admin')

@section('title', 'Dashboard | Destinations')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Destination</h1>
        <a href="{{ route('destinations.index') }}" class="d-none d-sm-inline-block btn bgColor bgHover text-white px-4 shadow-sm">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-5 rounded-3 border-0 my-5 shadow">
        <form action="{{ route('destinations.store') }}" method="post">
            @csrf

            <div class="form-group my-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group my-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="6" class="form-control"></textarea>
            </div>
            <div class="form-group my-4">
                <label for="rating" class="form-label">Rating</label>
                <input type="text" name="rating" id="rating" class="form-control">
            </div>
            <div class="row m-0">
                <div class="col-md-2 mt-md-0 mt-2 p-0">
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                </div>
                <div class="col-md-2 mt-md-0 mt-2 mx-md-4 p-0">
                    <div class="form-group">
                        <label for="area" class="form-label">Area</label>
                        <input type="text" name="area" id="area" class="form-control">
                    </div>
                </div>
                <div class="col-md-2 mt-md-0 mt-2 p-0">
                    <div class="form-group">
                        <label for="country" class="form-label">Country</label>
                        <select name="country" id="country" class="custom-select">
                            <option selected disabled hidden></option>
                            <option value="Japanese">Japanese</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Germany">Germany</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="custom-select">
                    <option selected disabled hidden></option>
                    <option value="Hotels">Hotels</option>
                    <option value="Hostels">Hostels</option>
                    <option value="Apartments">Apartments</option>
                </select>
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label class="mb-3">Facilities</label>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" value="1" name="restaurant" id="restaurant">
                        <label class="form-check-label" for="restaurant">
                          Restaurant
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" value="1" name="wifi" id="wifi">
                        <label class="form-check-label" for="wifi">
                          Wifi
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" value="1" name="elevator" id="elevator">
                        <label class="form-check-label" for="elevator">
                          Elevator
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" value="1" name="breakfast" id="breakfast">
                        <label class="form-check-label" for="breakfast">
                          Breakfast
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" value="1" name="parking" id="parking">
                        <label class="form-check-label" for="parking">
                          Parking
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" value="1" name="laundry" id="laundry">
                        <label class="form-check-label" for="laundry">
                          Laundry
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn bgColor bgHover text-white py-2 w-100 mt-4">Create</button>
        </form>
    </div>
</div>
@endsection
