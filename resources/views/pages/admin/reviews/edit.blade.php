@extends('layouts.admin')

@section('title', 'Dashboard | Reviews')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Review</h1>
        <a href="{{ route('reviews.index') }}" class="d-none d-sm-inline-block btn bgColor bgHover text-white px-4 shadow-sm">Back</a>
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
        <form action="{{ route('reviews.update', $review->id) }}" method="post">
            @csrf
            @method('put')

            <input type="hidden" name="id" id="id" value="{{ $review->id }}">
            <div class="form-group my-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $review->title }}">
            </div>
            <div class="form-group my-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="10" class="form-control" value="{{ $review->description }}">{{ $review->description }}</textarea>
            </div>
            <div class="row m-0">
                <div class="col-lg-8 p-0">
                    <div class="row m-0 justify-content-between">
                        <div class="col-md-3 mt-md-0 mt-2 p-0">
                            <div class="form-group">
                                <label for="user_id" class="form-label">User</label>
                                <select name="user_id" id="user_id" class="custom-select">
                                    <option selected hidden disabled></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $review->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-0 mt-2 p-0">
                            <div class="form-group">
                                <label for="travel_packages_id" class="form-label">Travel</label>
                                <select name="travel_packages_id" id="travel_packages_id" class="custom-select">
                                    <option selected hidden disabled></option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}" {{ $review->travel_packages_id == $destination->id ? 'selected' : '' }}>{{ $destination->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-0 mt-2 p-0">
                            <div class="form-group">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn bgColor bgHover text-white py-2 w-100 mt-4">Edit</button>
        </form>
    </div>
</div>
@endsection
