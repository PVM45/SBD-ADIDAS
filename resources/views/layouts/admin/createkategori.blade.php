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
                    <style>
                        .container {
                          margin-top: 20px;
                        }
                      
                        h4 {
                          margin-bottom: 20px;
                          font-size: 24px;
                        }
                      
                        .btn-primary {
                          margin-bottom: 20px;
                        }
                      
                        .alert {
                          margin-bottom: 20px;
                        }
                      
                        form .form-group {
                          margin-bottom: 20px;
                        }
                      
                        form label {
                          font-weight: bold;
                        }
                      
                        form input[type="text"],
                        form input[type="number"] {
                          width: 100%;
                          padding: 8px;
                          border: 1px solid #ccc;
                          border-radius: 4px;
                        }
                      
                        form button[type="submit"] {
                          padding: 8px 16px;
                          background-color: #007bff;
                          color: #fff;
                          border: none;
                          border-radius: 4px;
                        }
                      
                        form button[type="submit"]:hover {
                          background-color: #0069d9;
                        }
                      </style>
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header"></div>
                            <h4>
                              Add Category
                              <a href="{{url('admin/categories')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                            </h4>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <h4>Tambah Kategori</h4>
                            </div>
                            <div class="card-body">
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif
                              <form method="POST" action="{{ route('admin.categories.store') }}">
                                @csrf
                                <div class="form-group">
                                  <label for="name">Nama Kategori</label>
                                  <input type="text" class="form-control" id="name" name="nama_kategori" required>
                                </div>
                                <div class="form-group">
                                  <label for="id">ID Kategori</label>
                                  <input type="number" class="form-control" id="id" name="id" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                              </form>
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


