@extends('layouts.admin')

@section('title', 'Dashboard | Gallery')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Image Gallery</h1>
        <a href="{{ route('gallery.index') }}" class="d-none d-sm-inline-block btn bgColor bgHover text-white px-4 shadow-sm">Back</a>
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
        <form action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <input type="hidden" name="id" id="id" value="{{ $gallery->id }}">
            <div class="form-group my-4">
                <label class="form-label" for="image">Image</label><br>
                <img src="{{ Storage::url($gallery->image) }}" alt="image" width="100" class="my-3">
                <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg" class="form-control" value="{{ $gallery->image }}">
            </div>
            <div class="form-group my-4">
                <label class="form-label" for="travel_packages_id">Destination</label>
                <select name="travel_packages_id" id="travel_packages_id" class="custom-select">
                    <option selected hidden disabled></option>
                    @foreach ($travel_packages as $travel_package)
                        <option value="{{ $travel_package->id }}" {{ $travel_package->id == $gallery->travel_packages_id ? 'selected' : '' }}>{{ $travel_package->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn bgColor bgHover text-white py-2 w-100 mt-4">Edit</button>
        </form>
    </div>
</div>
@endsection
