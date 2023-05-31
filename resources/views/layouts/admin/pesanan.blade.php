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
    .container {
      margin-top: 20px;
    }
  
    h1 {
      margin-bottom: 20px;
      font-size: 24px;
    }
  
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
  
    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
  
    .btn-success {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
  
    .btn-danger {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
  
    .btn-warning {
      background-color: #ffc107;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
  
    .btn-primary {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
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
                        <div class="card-header"></div>
                      </div>
                      <div class="card">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                              <h1>Konfirmasi Pesanan</h1>
                  
                              <table>
                                <tr>
                                  <th>ID</th>
                                  <th>Nama User</th>
                                  <th>Alamat</th>
                                  <th>Metode Pembayaran</th>
                                  <th>Total Bayar</th>
                                  <th>Kode Bayar</th>
                                  <th>Status Pesanan</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Aksi</th>
                                </tr>
                  
                                @foreach ($pesanan as $data)
                                <tr>
                                  <td>{{ $data->id }}</td>
                                  <td>{{ $data->nama }}</td>
                                  <td>{{ $data->alamat }}</td>
                                  <td>{{ $data->metode_pembayaran }}</td>
                                  <td>{{ $data->total_pembayaran }}</td>
                                  <td>{{ $data->kode_pembayaran }}</td>
                                  <td>
                                    @if ($data->status_pesanan == 'terkonfirmasi')
                                    <button class="btn btn-success">Terkonfirmasi</button>
                                    @else
                                    <button class="btn btn-danger">Belum Dikonfirmasi</button>
                                    @endif
                                  </td>
                                  <td>{{ $data->tanggal_transaksi }}</td>
                                  <td>
                                    @if ($data->status_pesanan == 'terkonfirmasi')
                                    <form action="{{ route('admin.pesanan.batalkanKonfirmasi', $data->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-warning">Batalkan</button>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.pesanan.prosesKonfirmasi', $data->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                    </form>
                                    @endif
                                  </td>
                                </tr>
                                @endforeach
                              </table>
                              {{ $pesanan->links() }}
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

