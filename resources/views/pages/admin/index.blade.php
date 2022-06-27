@extends('layouts.admin')

@section('title', 'Gofest | Dashboard')

@section('content')
<div class="container-fluid">
    <div class="mb-5">
        <h1 class="h3 my-2 text-gray-800 font-weight-bolder">Dashboard</h1>
        <p>Semua tentang Database</p>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-primary shadow h-100 pt-2 pb-0">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                Destinations</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $destinations }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-info shadow h-100 pt-2 pb-0">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info mb-3">
                                GALLERY ( Images )</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $galleries }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-success shadow h-100 pt-2 pb-1">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col mr-4">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-3">Transactions
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h4 mb-0 mr-3 font-weight-bold text-gray-800">{{ floor((100 / $transactions->count()) * $successful) }}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            style="width: {{ (100 / $transactions->count()) * $successful }}%;" aria-valuenow="{{ (100 / $transactions->count()) * $successful }}" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs m-0 mt-3">{{ $successful }} dari {{ $transactions->count() }} Transaksi sudah berhasil</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">
                                Reviews</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $reviews }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger mb-3">
                                ACCOUNTS ( User and Admin )</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $reviews }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary mb-3">
                                TRANSPORTATIONS</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $transportations }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bus-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h1 class="h4 font-weight-bold text-dark mt-4 mb-2">History</h1>
            <p  class="mb-4">Transaksi yang terjadi akhir - akhir ini</p>
            <div class="card border-0 rounded-5 mb-5 shadow overflow">
                <div class="card-body p-0 p-3">
                    <table class="table table-borderless mx-auto">
                        <thead>
                            <tr>
                                <th class="align-middle">ID</th>
                                <th class="align-middle">Penginapan</th>
                                <th class="align-middle">Pemesan</th>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">Nomor Telepon</th>
                                <th class="align-middle">Check In</th>
                                <th class="align-middle">Check Out</th>
                                <th class="align-middle">Tipe Fasilitas</th>
                                <th class="align-middle">Total Pembayaran</th>
                                <th class="align-middle">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $data)
                                <tr>
                                    <td class="align-middle">{{ $data->id }}</td>
                                    <td class="align-middle">{{ $data->travel_package->title }}</td>
                                    <td class="align-middle">{{ $data->name }}</td>
                                    <td class="align-middle">{{ $data->email }}</td>
                                    <td class="align-middle">+{{ $data->phone_number }}</td>
                                    <td class="align-middle">{{ date('l, d F Y', strtotime($data->check_in)) }}</td>
                                    <td class="align-middle">{{ date('l, d F Y', strtotime($data->check_out)) }}</td>
                                    <td class="align-middle">{{ $data->type_trip }}</td>
                                    <td class="align-middle">{{ $data->transaction_total }}</td>
                                    <td class="align-middle">{{ $data->transaction_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
