@extends('main')

@section('container')
    <div class="bg-white m-0 p-3 rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h3 text-gray-800">Riwayat Transaksi</h1>
        </div>
        <div class="table-responsive col-md-7">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Waktu Transaksi</th>
                        <th>Total Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) == 0)
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada riwayat transaksi</td>
                        </tr>
                    @else
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>Rp. <?php echo number_format($d->total_harga, 2, ',', '.'); ?></td>
                                <td class="text-center"><a href="/detail/{{ $d->id }}"
                                        class="badge bg-success text-white rounded-0">Lihat Detail</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection