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
<style>
    .row {
        margin-bottom: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f2f2f2;
        padding: 12px;
    }

    .card-header h4 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .float-end {
        float: right;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tbody tr:hover {
        background-color: #f9f9f9;
    }

    .thumbnail {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .action-buttons button {
        padding: 8px 12px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .action-buttons button:hover {
        background-color: #45a049;
    }

    .action-buttons form {
        display: inline-block;
    }

    .action-buttons form button {
        background-color: #f44336;
    }

    .action-buttons form button:hover {
        background-color: #c62828;
    }
</style>

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
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Product
                                        <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">Add Products</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="card">
                           
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>Daftar Produk</h1>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>ID Produk</th>
                                                        <th>Nama Produk</th>
                                                        <th>ID Kategori</th>
                                                        <th>ID Sub Kategori</th>
                                                        <th>Deskripsi</th>
                                                        <th>Warna</th>
                                                        <th>Ukuran</th>
                                                        <th>Harga</th>
                                                        <th>Status</th>
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
                                                            <td>{{ $product->kategori_id }}</td>
                                                            <td>{{ $product->subkategori_id }}</td>
                                                            <td>{{ Str::limit($product->deskripsi_produk, 100, '...') }}</td>
                                                            <td>{{ $product->varian_warna }}</td>
                                                            <td>{{ $product->ukuran }}</td>
                                                            <td>{{ $product->harga_produk }}</td>
                                                            <td>{{ $product->status_produk }}</td>
                                                            <td><img src="{{ url('storage/'.$product->gambar_produk) }}" alt="gambar1" class="thumbnail"></td>
                                                            <td><img src="{{ url('storage/'.$product->gambar_produk_2) }}" alt="gambar1" class="thumbnail"></td>
                                                            <td><img src="{{ url('storage/'.$product->gambar_produk_3) }}" alt="gambar1" class="thumbnail"></td>
                                                            <td>
                                                                <div class="action-buttons">
                                                                    <a href="{{ route('admin.produk.edit', $product->id) }}">
                                                                        <button>Edit</button>
                                                                    </a>
                                                                    <form action="{{ route('admin.produk.destroy', $product->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus Produk ini?')">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $products->links() }}
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
{{-- @foreach ($collection as $item)
    
@if ($item->status_pesanan == 'belum dibayar')
    <button class="btn btn-danger">belum Dibaya</button>
    @else
    <button class="btn btn-succes"></button>
@endif
@if ($item->status_pesanan == 'belum dibayar')
   <form action="" method="post"></form>
    <button class="btn btn-succes"></button>
@endif
@endforeach --}}