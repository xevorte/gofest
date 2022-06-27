@extends('layouts.admin')

@section('title', 'Dashboard | Transportations')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transportations</h1>
            <a href="{{ route('transportation.create') }}" class="d-none d-sm-inline-block btn bgColor bgHover text-white px-4 shadow-sm"><i class="fas fa-plus"></i> Create</a>
        </div>

        <div class="card p-4 rounded-3 border-0 my-5 shadow overflow">
            <table class="table table-bordered rounded-3 bg-white my-0 mx-auto text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transportations as $transportation)
                    <tr>
                        <td class="align-middle">{{ $transportation->id }}</td>
                        <td class="align-middle text-center">
                            <img src="{{ Storage::url($transportation->image) }}" alt="transportation" width="200">
                        </td>
                        <td class="align-middle">{{ $transportation->company_name }}</td>
                        <td class="align-middle">{{ $transportation->type }}</td>
                        <td class="align-middle">{{ $transportation->status }}</td>
                        <td class="align-middle"">
                            <a href="{{ route('transportation.edit', $transportation->id) }}" class="btn bgColor bgHover text-white"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('transportation.destroy', $transportation->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
    
                                <button type="submit" class="btn bgColor bgHover text-white" onclick="return confirm('Delete?');"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-danger">
                            <h5 class="font-weight-bold">Empty Data</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection