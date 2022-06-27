@extends('layouts.admin')

@section('title', 'Dashboard | Transportations')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Transportation</h1>
        <a href="{{ route('transportation.index') }}" class="d-none d-sm-inline-block btn bgColor bgHover text-white px-4 shadow-sm">Back</a>
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
        <form action="{{ route('transportation.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group my-4">
                <label class="form-label" for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group my-4">
                <label for="company_name" class="form-label">Company</label>
                <input type="text" name="company_name" id="company_name" class="form-control" required>
            </div>
            <div class="form-group my-4">
                <label class="form-label" for="type">Type</label>
                <select name="type" id="type" class="custom-select">
                    <option selected hidden disabled></option>
                    <option value="Flights">Flights</option>
                    <option value="Trains">Trains</option>
                    <option value="Bus">Bus</option>
                </select>
            </div>
            <div class="form-group my-4">
                <label class="form-label" for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option selected hidden disabled></option>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
            <button type="submit" class="btn bgColor bgHover text-white py-2 w-100 mt-4">Create</button>
        </form>
    </div>
</div>
@endsection
