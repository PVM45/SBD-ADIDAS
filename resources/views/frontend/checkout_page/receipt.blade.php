<!-- Contoh view -->
@foreach ($pesanan as $pesanans)
    {{-- <p>ID Pesanan: {{ $pesanan->id }}</p> --}}
    <p>Tanggal Transaksi: {{ $pesanans->tanggal_transaksi }}</p>
    <p>Kode Pembayaran: {{ $pesanans->kode_pembayaran }}</p>
    <!-- Tambahkan informasi lain yang ingin ditampilkan -->
    <hr>
@endforeach

@foreach ($produk_pesanan as $produk_pesanans)
    <p> {{ $produk_pesanans->produk->nama_produk }} </p>
@endforeach

