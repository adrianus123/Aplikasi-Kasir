@extends('main')

@section('container')
    <div class="container bg-white m-0 p-3 rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h3 text-gray-800">Dashboard</h1>
        </div>

        <div class="d-flex">
            <div class="card text-white bg-primary mb-3 mx-2" style="min-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Jenis Produk</h5>
                    <p class="card-text fw-bold fs-1">{{ count($barangs) }}</p>
                </div>
            </div>
            <div class="card text-white bg-success mb-3 mx-2" style="min-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Transaksi</h5>
                    <p class="card-text fw-bold fs-1">{{ count($transaksis) }}</p>
                </div>
            </div>
            <div class="card text-white bg-danger mb-3 mx-2" style="min-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <p class="card-text fw-bold fs-1">Rp {{ number_format($total, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
