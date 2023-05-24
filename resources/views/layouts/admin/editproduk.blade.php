<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       @include('layouts/admin/side')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               @include('layouts/admin/topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<div class="row" >
    <div class="col-md-12">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.produk.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" value="{{ $product->nama_produk }}" required>
    </div>

    <div>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->id_kategori == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="id_subkategori">Sub Kategori</label>
        <select name="id_subkategori" id="id_subkategori" required>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $product->id_subkategori == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->nama_subkategori }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="deskripsi_produk">Deskripsi</label>
        <textarea name="deskripsi_produk" id="deskripsi_produk" rows="5" required>{{ $product->deskripsi_produk }}</textarea>
    </div>

   

    <div>
        <label for="varian_warna">Warna</label>
        <input type="text" name="varian_warna" id="varian_warna" value="{{ $product->varian_warna }}" required>
    </div>

    <div>
        <label for="ukuran">Ukuran</label>
        <input type="text" name="ukuran" id="ukuran" value="{{ $product->ukuran }}" required>
    </div>

    

    <div>
        <label for="harga_produk">Harga</label>
        <input type="number" name="harga_produk" id="harga_produk" value="{{ $product->harga_produk }}" required>
    </div>

    <div>
        <label for="product_image_1">Gambar 1</label>
        <input type="file" name="gambar_produk" id="product_image_1" >
    </div>

    <div>
        <label for="product_image_2">Gambar 2</label>
        <input type="file" name="gambar_produk_2" id="product_image_2" >
    </div>

    <div>
        <label for="product_image_3">Gambar 3</label>
        <input type="file" name="gambar_produk_3" id="product_image_2" >
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div></form>
    </div>
</div>
    </div></div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts/admin/footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

</body>

</html>




<form method="POST" action="{{ route('admin.produk.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" value="{{ $product->nama_produk }}" required>
    </div>

    <div>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->id_kategori == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="id_subkategori">Sub Kategori</label>
        <select name="id_subkategori" id="id_subkategori" required>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $product->id_subkategori == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->nama_subkategori }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="deskripsi_produk">Deskripsi</label>
        <textarea name="deskripsi_produk" id="deskripsi_produk" rows="5" required>{{ $product->deskripsi_produk }}</textarea>
    </div>

    <div>
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="{{ $product->stok }}" required>
    </div>

    <div>
        <label for="varian_warna">Warna</label>
        <input type="text" name="varian_warna" id="varian_warna" value="{{ $product->varian_warna }}" required>
    </div>

    <div>
        <label for="ukuran">Ukuran</label>
        <input type="text" name="ukuran" id="ukuran" value="{{ $product->ukuran }}" required>
    </div>

    <div>
        <label for="status_produk">Status</label>
        <select name="status_produk" id="status_produk" required>
            <option value="tersedia" {{ $product->status_produk == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="tidak tersedia" {{ $product->status_produk == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
        </select>
    </div>

    <div>
        <label for="harga_produk">Harga</label>
        <input type="number" name="harga_produk" id="harga_produk" value="{{ $product->harga_produk }}" required>
    </div>

    <div>
        <label for="product_image_1">Gambar 1</label>
        <input type="file" name="product_image_1" id="product_image_1" required>
    </div>

    <div>
        <label for="product_image_2">Gambar 2</label>
        <input type="file" name="product_image_2" id="product_image_2" required>
    </div>

    <div>
        <label for="product_image_3">Gambar 3</label>
