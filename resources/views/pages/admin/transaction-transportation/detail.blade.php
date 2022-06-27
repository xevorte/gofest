@extends('layouts.admin')

@section('title', 'Dashboard | Transaction | Transportations')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Transaction</h1>
    <div class="card p-4 rounded-3 border-0 my-5 shadow overflow">
        <table class="table table-bordered rounded-3 bg-white my-0 mx-auto">
            <thead class="bgTheme text-white text-center">
                <tr>
                    <th colspan="2"><h5 class="m-0 fw-bold">Data</h5></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th width="20%" class="align-middle">ID</th>
                    <td class="align-middle">{{ $data->id }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Company</th>
                    <td class="align-middle">{{ $data->transportation->company_name }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Name</th>
                    <td class="align-middle">{{ $data->name }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Email Address</th>
                    <td class="align-middle">{{ $data->email }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Phone Number</th>
                    <td class="align-middle">+{{ $data->phone_number }}</td>
                </tr>
                <tr>
                    <th class="align-middle">From</th>
                    <td class="align-middle">{{ $data->from }}</td>
                </tr>
                <tr>
                    <th class="align-middle">To</th>
                    <td class="align-middle">{{ $data->to }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Departure</th>
                    <td class="align-middle">{{ date('l, F j Y', strtotime($data->departure_date)) }}, {{ $data->departure_time }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Total Seat / Guest</th>
                    <td class="align-middle">{{ $data->guests == 1 ? 'Single Seat' : $data->guests.' Seats' }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Facilites Class</th>
                    <td class="align-middle">{{ $data->class }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Payment Proof</th>
                    <td class="align-middle">
                        @if(isset($data->payment->image))
                            <img src="{{ Storage::url($data->payment->image) }}" width="160">
                        @else
                        PENDING
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="align-middle">Payment Type</th>
                    <td class="align-middle">{{ isset($data->payment->type) ? $data->payment->type : 'PENDING' }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Payment Name</th>
                    <td class="align-middle">{{ isset($data->payment->name) ? $data->payment->name : 'PENDING' }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Total Price</th>
                    <td class="align-middle">$ {{ $data->transaction_total }} / {{ number_format($data->transaction_total * 14000, 0, '', '.') }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Status</th>
                    <td class="align-middle">{{ $data->transaction_status }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Action</th>
                    <td class="align-middle d-flex align-items-center">
                        @if($data->transaction_status == 'PENDING' or $data->transaction_status == 'WAITING')
                        <form action="{{ route('transaction-transportations.update', $data->id) }}" method="post">
                            @csrf
                            @method('put')

                            <button type="submit" class="btn bgColor bgHover text-white fw-bolder">Approve Transaction</button>
                        </form>
                        <form action="{{ route('transaction-transportations.cancel', $data->id) }}" method="post">
                            @csrf

                            <button type="submit" class="btn btn-danger fw-bolder mx-3">Cancel Transaction</button>
                        </form>
                        @endif
                        <form action="{{ route('transaction-transportations.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger fw-bolder">Delete Transaction</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
