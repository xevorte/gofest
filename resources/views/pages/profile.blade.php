@extends('layouts.auth')

@section('title')
Profile {{ $data->name }}
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
    <div class="container d-flex align-items-center justify-content-center my-4" style="min-height: 88.8vh;">
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="w-75">
            @csrf
            @method('post')

            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
            <input type="hidden" name="currentimage" id="currentimage" value="{{ $data->image }}">
            <div class="text-center position-relative">
                <img src="{{ $data->image == null ? Storage::url('assets/user_image/user.png') : Storage::url($data->image) }}" width="100" class="rounded-circle">
                <div class="form-group position-absolute" style="left: 52%; top: 50%">
                    <input type="file" name="image" id="image" style="display: none;">
                    <label for="image" class="form-label m-0 bg-white shadow-base py-1 px-2 rounded-circle baseColor"><i class="fas fa-pencil-alt"></i></label>
                </div>
            </div>

            <div class="form-group mt-5">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input type="text" name="email" id="email" class="form-control bg-white rounded-12 py-2 px-3 p" value="{{ $data->email }}" required>
            </div>
            <div class="row m-0">
                <div class="col-md-6 p-0 pe-md-4">
                    <div class="form-group my-2">
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control bg-white rounded-12 py-2 px-3 p" value="{{ $data->name }}" required>
                    </div>
                </div>
                <div class="col-md-6 p-0 ps-md-4">
                    <div class="form-group my-2">
                        <label for="job" class="form-label fw-bold">Job Detail</label>
                        <input type="text" name="job" id="job" class="form-control bg-white rounded-12 py-2 px-3 p" value="{{ $data->job }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="currentpassword" class="form-label fw-bold">Current Password</label>
                <input type="password" name="currentpassword" id="currentpassword" class="form-control bg-white rounded-12 py-2 px-3 p" required>
            </div>
            <div class="form-group mt-3">
                <label for="newpassword" class="form-label fw-bold">New Password</label>
                <input type="password" name="newpassword" id="newpassword" class="form-control bg-white rounded-12 py-2 px-3 p" required>
            </div>
            <button type="submit" class="btn bgTheme text-white rounded-12 py-2 w-100 mt-4 fw-bold">Save Profile</button>
        </form>
    </div>
@endsection