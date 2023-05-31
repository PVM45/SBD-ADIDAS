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
                <style>
                    .container {
                      margin-top: 20px;
                    }
                  
                    h4 {
                      margin-bottom: 20px;
                      font-size: 24px;
                    }
                  
                    .float-end {
                      float: right;
                    }
                  
                    .btn {
                      margin-right: 10px;
                    }
                  
                    .table {
                      margin-top: 20px;
                    }
                  
                    .card {
                      border: 1px solid #ccc;
                      border-radius: 5px;
                      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                      margin-bottom: 20px;
                    }
                  
                    .card-header {
                      background-color: #f8f9fa;
                      padding: 10px 20px;
                      border-bottom: 1px solid #ccc;
                      border-radius: 5px 5px 0 0;
                    }
                  
                    .card-body {
                      padding: 20px;
                    }
                  
                    .btn-primary {
                      background-color: #007bff;
                      color: #fff;
                      border: none;
                    }
                  
                    .btn-primary:hover {
                      background-color: #0069d9;
                    }
                  
                    .btn-danger {
                      background-color: #dc3545;
                      color: #fff;
                      border: none;
                    }
                  
                    .btn-danger:hover {
                      background-color: #c82333;
                    }
                  
                    .btn-warning {
                      background-color: #ffc107;
                      color: #000;
                      border: none;
                    }
                  
                    .btn-warning:hover {
                      background-color: #e0a800;
                    }
                  
                    .btn-primary.btn-sm,
                    .btn-danger.btn-sm,
                    .btn-warning.btn-sm {
                      font-size: 14px;
                      padding: 6px 12px;
                    }
                  
                    .table {
                      width: 100%;
                      border-collapse: collapse;
                    }
                  
                    .table th,
                    .table td {
                      padding: 8px;
                      border-bottom: 1px solid #ccc;
                    }
                  
                    .table th {
                      background-color: #f8f9fa;
                      text-align: left;
                      font-weight: bold;
                    }
                  </style>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Category</h4>
                        </div>
                        <div class="card-body">
                          <div class="float-end">
                            <a href="{{url('admin/categories/create')}}" class="btn btn-primary btn-sm">Add Category</a>
                            <a href="{{url('admin/subcategories/create')}}" class="btn btn-primary btn-sm">Add SubCategory</a>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <h4>Daftar Kategori</h4>
                            </div>
                            <div class="card-body">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($categories as $category)
                                  <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->nama_kategori }}</td>
                                    <td>
                                      <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                                      </form>
                                    </td>
                                    <td>
                                      <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                          <input type="text" class="form-control" name="name" value="{{ $category->nama_kategori }}">
                                          <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit nama kategori ini?')">Update</button>
                                        </div>
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


