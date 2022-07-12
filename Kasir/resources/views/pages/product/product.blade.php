@extends('main')

@section('container')
    <div class="container bg-white m-0 p-3 rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h3 text-gray-800">Daftar Produk</h1>
        </div>

        <div class="col-md-7">

            {{-- Alert --}}
            <div>
                @if (session()->has('add_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('add_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <a href="/createProduct" class="btn btn-success mb-3">Tambah Produk</a>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            {{-- <th class="text-center">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama_barang }}</td>
                                <td>Rp {{ number_format($product->harga_satuan, 2, ',', '.') }}</td>
                                {{-- <td class="text-center">
                                    <a href="#" class="badge bg-warning text-white rounded-0"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="badge bg-danger text-white rounded-0"><i class="bi bi-trash3-fill"></i></a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
