@extends('main')

@section('container')

    {{-- Transaksi --}}
    <div class="bg-white m-0 p-3 rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h3 text-gray-800">Transaksi</h1>
        </div>

        {{-- Alert --}}
        <div>
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('empty'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('empty') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('isEmpty'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('isEmpty') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        <form action="/add" method="POST">
            @csrf
            <div class="form-group">
                <table class="w-75">
                    <tr>
                        <td>
                            <label for="">Kode Produk</label>
                        </td>
                        <td>:</td>
                        <td>
                            <select class="selectpicker" data-live-search="true" id="produk" name="product_id">
                                <option value="">-- Pilih Kode Produk --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->id }} - {{ $product->nama_barang }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                {{-- <label for="">Pilih Kode Produk : </label>
                <select class="selectpicker" data-live-search="true" id="produk" name="product_id">
                    <option value="">-- Pilih Kode Produk --</option>
                    @foreach ($products as $product)
                        <option data-tokens="{{ $product->nama_barang }}" value="{{ $product->id }}">
                            {{ $product->id }} - {{ $product->nama_barang }}</option>
                    @endforeach
                </select> --}}
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-group col-md-5 px-0">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                        name="nama_barang" placeholder="Nama Barang" readonly>
                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-4 px-0">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" placeholder="Harga" readonly>
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-2S px-0">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="qty"
                        name="jumlah" placeholder="Jumlah" required>
                    @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <input class="btn btn-primary" type="submit" name="submit" value="Tambah" />
            </div>
        </form>
    </div>

    {{-- Produk yang dibeli --}}
    <div class="bg-white m-0 mt-3 p-3 rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h3 text-gray-800">Informasi Produk</h1>
        </div>
        <div class="table-responsive">
            @php
                $totalHarga = 0;
            @endphp
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($cart) || count($cart) == 0)
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada produk</td>
                        </tr>
                    @else
                        @foreach ($cart as $c => $val)
                            <tr>
                                <td>{{ $val['nama_produk'] }}</td>
                                {{-- <td></td> --}}
                                <td>Rp. {{ number_format($val['harga_satuan'], 2, ',', '.') }}</td>
                                <td>{{ $val['jumlah'] }}</td>
                                {{-- <td></td> --}}
                                <td>Rp. {{ number_format($val['harga_satuan'] * $val['jumlah'], 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="/delete/{{ $val['id_produk'] }}"
                                        class="badge bg-danger text-white text-center"><i class="bi bi-x-circle"></i></a>
                                </td>
                            </tr>
                            @php
                                $totalHarga += $val['harga_satuan'] * $val['jumlah'];
                            @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                @if (empty($cart) || count($cart) == 0)
                    <h3>Total Harga : Rp. 0,00</h3>
                @else
                    <h3>Total Harga : Rp. {{ number_format($totalHarga, 2, ',', '.') }}</h3>
                @endif
                <div>
                    <a href="/deleteAll" class="btn btn-danger">Hapus</a>
                    <a href="/buy/{{ $totalHarga }}" class="btn btn-primary">Beli</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#produk', function() {
                var p_id = $(this).val();
                console.log(p_id);

                $.ajax({
                    type: 'GET',
                    url: '/findProductId',
                    data: {
                        'id': p_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data.nama_barang);
                        // console.log(data);

                        // Set Nilai
                        $('#nama_barang').val(data.nama_barang);
                        $('#harga').val(data.harga_satuan);
                    },
                    error: function() {}
                });
            });
        });

        // Search
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
@endsection
