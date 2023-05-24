<!-- resources/views/products/index.blade.php -->
<h1>Daftar Produk</h1>

<table>
    <thead>
        <tr>
            <th hidden>id</th>
            <th>Nama</th>
            <th hidden>id kategori</th>
            <th hidden>id subkategori</th>
            <th>Deskripsi</th>
            <th>Harga</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
            <tr>
                <td>{{ $produk->id}}</td>
                <td>{{ $produk->nama_produk}}</td>
                <td>{{ $produk->id_kategori }}</td>
                <td>{{ $produk->id_subkategori}}</td>
                <td>{{ $produk->deskripsi_produk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
