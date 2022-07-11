@extends('main')

@section('container')
    <div class="container bg-white m-0 p-3 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h3 text-gray-800">Detail Transaksi</h1>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="d-flex flex-column">
                <div class="d-flex justify-content-center">
                    <table cellpadding="5">
                        <tr>
                            <th>ID Transaksi</th>
                            <td>:</td>
                            <td>{{ $data_transaksi->id }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Transaksi</th>
                            <td>:</td>
                            <td>{{ $data_transaksi->created_at }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_transaksi->transaction as $item)
                                            @php
                                                $data = \App\Models\Barang::where('id', $item->master_barang_id)->first();
                                            @endphp
                                            <tr>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>Rp {{ number_format($item->harga_satuan, 2, ',', '.') }}</td>
                                                <td>Rp
                                                    {{ number_format($item->harga_satuan * $item->jumlah, 2, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>:</td>
                            <th>Rp {{ number_format($data_transaksi->total_harga, 2, ',', '.') }}</th>
                        </tr>
                    </table>
                </div>
                <a href="/history" class="btn btn-info my-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
