@extends('layouts.admin')

@section('title', 'Dashboard | Destinations')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Destination</h1>
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
        <form action="{{ route('destinations.update', $destination->id) }}" method="post">
            @csrf
            @method('put')

            <input type="hidden" name="id" id="id" value="{{ $destination->id }}">
            <div class="form-group my-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $destination->title }}">
            </div>
            <div class="form-group my-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="6" class="form-control">{{ $destination->description }}</textarea>
            </div>
            <div class="form-group my-4">
                <label for="rating" class="form-label">Rating</label>
                <input type="text" name="rating" id="rating" class="form-control" value="{{ $destination->rating }}">
            </div>
            <div class="row m-0">
                <div class="col-md-2 mt-md-0 mt-2 p-0">
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $destination->city }}">
                    </div>
                </div>
                <div class="col-md-2 mt-md-0 mt-2 mx-md-4 p-0">
                    <div class="form-group">
                        <label for="area" class="form-label">Area</label>
                        <input type="text" name="area" id="area" class="form-control" value="{{ $destination->area }}">
                    </div>
                </div>
                <div class="col-md-2 mt-md-0 mt-2 p-0">
                    <div class="form-group">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{ $destination->country }}">
                    </div>
                </div>
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="custom-select">
                    <option selected disabled hidden></option>
                    <option value="Hotels" {{ $destination->type == 'Hotels' ? 'selected' : '' }}>Hotels</option>
                    <option value="Hostels" {{ $destination->type == 'Hostels' ? 'selected' : '' }}>Hostels</option>
                    <option value="Apartments" {{ $destination->type == 'Apartments' ? 'selected' : '' }}>Apartments</option>
                </select>
            </div>
            <div class="form-group mt-2 mb-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $destination->price }}">
            </div>
            <div class="form-group mt-2">
                <label class="mb-3">Facilities</label>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" {{ $destination->restaurant == 1 ? 'checked' : '' }} value="1" id="restaurant">
                        <label class="form-check-label" for="restaurant">
                          Restaurant
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" {{ $destination->wifi == 1 ? 'checked' : '' }} value="1" id="wifi">
                        <label class="form-check-label" for="wifi">
                          Wifi
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" {{ $destination->elevator == 1 ? 'checked' : '' }} value="1" id="elevator">
                        <label class="form-check-label" for="elevator">
                          Elevator
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" {{ $destination->breakfast == 1 ? 'checked' : '' }} value="1" id="breakfast">
                        <label class="form-check-label" for="breakfast">
                          Breakfast
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" {{ $destination->parking == 1 ? 'checked' : '' }} value="1" id="parking">
                        <label class="form-check-label" for="parking">
                          Parking
                        </label>
                    </div>
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" {{ $destination->laundry == 1 ? 'checked' : '' }} value="1" id="laundry">
                        <label class="form-check-label" for="laundry">
                          Laundry
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn bgColor bgHover text-white py-2 w-100 mt-4">Edit</button>
        </form>
    </div>
</div>
@endsection
