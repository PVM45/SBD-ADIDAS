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
<div class="card">
    <div class="card-header"></div>
<h4>Product
    <a href="{{url('admin/products/create')}} " class="btn btn-primary btn-sm float-end">Add Products</a>
</h4>
</div>
<div class="card">
    <div class="card-header">
        <h4>Daftar Produk</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Produk</h1>
<table>
    <thead>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Sub Kategori</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Status</th>
            <th>Harga</th>
            <th>Gambar 1</th>
            <th>Gambar 2</th>
            <th>Gambar 3</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ $product->id_kategori }}</td>
                <td>{{ $product->id_subkategori }}</td>
                <td>{{ $product->deskripsi_produk }}</td>
                <td>{{ $product->stok }}</td>
                <td>{{ $product->varian_warna }}</td>
                <td>{{ $product->ukuran }}</td>
                <td>{{ $product->status_produk }}</td>
                <td>{{ $product->harga_produk }}</td>
                <td><img src="{{ asset('storage/'.$product->gambar_produk) }}" alt=""></td>
                <td><img src="{{ asset('storage/'.$product->gambar_produk_2) }}" alt=""></td>
                <td><img src="{{ asset('storage/'.$product->gambar_produk_3) }}" alt=""></td>
                <td><a href="{{ route('admin.produk.edit', $product->id) }}"><button>Edit</button></a></td>
                <td>
                    <form action="{{ route('admin.produk.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>
    </div>
</div>

</div>
    </div>
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