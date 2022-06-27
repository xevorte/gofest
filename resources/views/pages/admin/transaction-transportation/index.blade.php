@extends('layouts.admin')

@section('title', 'Dashboard | Transaction | Transportations')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Transactions</h1>
    <div class="card p-4 rounded-3 border-0 my-5 shadow overflow">
        <table class="table table-bordered rounded-3 bg-white my-0 mx-auto overflow">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Seats</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Code</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="align-middle">{{ $transaction->id }}</td>
                        <td class="align-middle">{{ $transaction->name }}</td>
                        <td class="align-middle">{{ $transaction->transportation->company_name }}</td>
                        <td class="align-middle">{{ $transaction->guests }}</td>
                        <td class="align-middle">{{ $transaction->from }}</td>
                        <td class="align-middle">{{ $transaction->to }}</td>
                        <td class="align-middle">{{ date('l, F j Y', strtotime($transaction->departure_date)) }}, {{ $transaction->departure_time }}</td>
                        <td class="align-middle">{{ $transaction->class }}</td>
                        <td class="align-middle">$ {{ $transaction->transaction_total }}</td>
                        <td class="align-middle font-weight-bold {{ $transaction->transaction_status == 'SUCCESSFUL' ? 'text-success' : ($transaction->transaction_status == 'PENDING' ? 'text-warning' : 'text-danger') }}">{{ $transaction->transaction_status }}</td>
                        <td class="align-middle">#{{ $transaction->transaction_code }}</td>
                        <td class="align-middle d-flex justify-content-center">
                            <a href="{{ route('transaction-transportations.show', $transaction->id) }}" class="btn bgColor bgHover text-white"><i class="fas fa-eye-dropper"></i></a>
                            @if($transaction->transaction_status == 'SUCCESSFUL')
                            <form action="{{ route('retrieve.voucher-transportation') }}" target="_blank" method="post">
                                @csrf
                                
                                <input type="hidden" name="kode" id="kode" value="{{ $transaction->transaction_code }}">
                                <button type="submit" class="btn bgColor bgHover text-white fw-bolder rounded-8 ml-2">
                                    <p class="m-0"><i class="fas fa-file-alt"></i></p>
                                </button>
                            </form>
                            @else
                            <button class="btn bgColor bgHover text-white fw-bolder rounded-8 ml-2 disabled">
                                <p class="m-0"><i class="fas fa-file-alt"></i></p>
                            </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
