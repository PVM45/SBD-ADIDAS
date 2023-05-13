<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_sub_kategori">Sub Kategori</label>
        <select name="id_sub_kategori" class="form-control" required>
            <option value="">Pilih Sub Kategori</option>
            @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory->id }}">{{ $subCategory->nama_sub_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    
    <div class="form-group">
        <label for="warna">Warna</label>
        <input type="text" name="warna" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="ukuran">Ukuran</label>
        <input type="text" name="ukuran" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="harga_produk">Harga Produk</label>
        <input type="number" name="harga_produk" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" class="form-control-file" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Tambah Produk</button>
</form>    