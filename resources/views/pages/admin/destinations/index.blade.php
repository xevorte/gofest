@extends('layouts.admin')

@section('title', 'Dashboard | Destinations')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Destinations</h1>
        <a href="{{ route('destinations.create') }}"
            class="d-none d-sm-inline-block btn bgColor bgHover text-white px-4 shadow-sm"><i class="fas fa-plus"></i>
            Create</a>
    </div>
    <div class="card p-4 rounded-3 border-0 my-5 shadow overflow">
        <table class="table table-bordered rounded-3 bg-white my-0 mx-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinations as $destination)
                <tr>
                    <td class="align-middle">{{ $destination->id }}</td>
                    <td class="align-middle">{{ $destination->title }}</td>
                    <td class="align-middle">{{ Str::limit($destination->description, 40, '...') }}</td>
                    <td class="align-middle">{{ $destination->price }}</td>
                    <td class="align-middle">{{ $destination->rating }}</td>
                    <td class="align-middle">{{ $destination->type }}</td>
                    <td class="align-middle" width="20%">{{ $destination->city }}, {{ $destination->area }},
                        {{ $destination->country }}</td>
                    <td class="align-middle"">
                        <a href=" {{ route('destinations.edit', $destination->id) }}"
                        class="btn bgColor bgHover text-white"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn bgColor bgHover text-white"
                                onclick="return confirm('Delete?');"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <h5>Empty Data</h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
