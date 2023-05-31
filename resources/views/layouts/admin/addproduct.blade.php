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
                      
                        h2 {
                          margin-bottom: 20px;
                          font-size: 24px;
                        }
                      
                        .btn-primary {
                          margin-bottom: 20px;
                        }
                      
                        .alert {
                          margin-bottom: 20px;
                        }
                      
                        form table {
                          margin-bottom: 20px;
                          width: 100%;
                        }
                      
                        form table td {
                          padding: 8px;
                          vertical-align: top;
                        }
                      
                        form table label {
                          font-weight: bold;
                        }
                      
                        form table input[type="text"],
                        form table input[type="number"],
                        form table textarea,
                        form table select {
                          width: 100%;
                          padding: 8px;
                          border: 1px solid #ccc;
                          border-radius: 4px;
                          resize: vertical;
                        }
                      
                        form table button[type="submit"] {
                          padding: 8px 16px;
                          background-color: #007bff;
                          color: #fff;
                          border: none;
                          border-radius: 4px;
                        }
                      
                        form table button[type="submit"]:hover {
                          background-color: #0069d9;
                        }
                      </style>
                      
                      <div class="row">
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
                      
                          <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <table>
                              <tr>
                                <td>
                                  <label for="product_id">ID Produk</label>
                                </td>
                                <td>
                                  <input type="text" name="product_id" id="product_id" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_name">Nama Produk</label>
                                </td>
                                <td>
                                  <input type="text" name="product_name" id="product_name" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="id_kategori">Id Kategori:</label>
                                </td>
                                <td>
                                  <select class="form-control" id="id_kategori" name="id_kategori">
                                    @foreach($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="id_sub_kategori">Sub Kategori:</label>
                                </td>
                                <td>
                                  <select class="form-control" id="id_sub_kategori" name="id_sub_kategori">
                                    @foreach($subcategories as $sub_kategori)
                                    <option value="{{ $sub_kategori->id }}">{{ $sub_kategori->nama_subkategori }}</option>
                                    @endforeach
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_description">Deskripsi Produk</label>
                                </td>
                                <td>
                                  <textarea name="product_description" id="product_description" rows="5" required></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_color">Warna</label>
                                </td>
                                <td>
                                  <input type="text" name="product_color" id="product_color" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_size">Ukuran</label>
                                </td>
                                <td>
                                  <input type="text" name="product_size" id="product_size" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_price">Harga</label>
                                </td>
                                <td>
                                  <input type="number" name="product_price" id="product_price" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_image_1">Gambar 1</label>
                                </td>
                                <td>
                                  <input type="file" name="product_image_1" id="product_image_1" enctype="multipart/form-data" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_image_2">Gambar 2</label>
                                </td>
                                <td>
                                  <input type="file" name="product_image_2" id="product_image_2" enctype="multipart/form-data" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="product_image_3">Gambar 3</label>
                                </td>
                                <td>
                                  <input type="file" name="product_image_3" id="product_image_3" required>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  <button type="submit">Tambah Produk</button>
                                </td>
                              </tr>
                            </table>
                          </form>
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



