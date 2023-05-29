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

                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Show All User</h1>
                    </div>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Total Pesanan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @if ($users->count() > 0)
                                        @foreach ($users as $item => $user)
                                        <div id="changePasswordForm" style="display: none;">
                                            <form method="POST" action="{{ route('admin.useradmin.update', $user->id) }}">
                                                @csrf
                                                @method('PUT')
                                        
                                                <div class="form-group">
                                                    <label for="password">Password Baru</label>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Saja Password">
                                                </div>
                                        
                                           
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                        <tr>
                                            <td>{{ $item + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ substr($user->email, 0, 1) . str_repeat('*', 3) . substr($user->email, strpos($user->email, '@')) }}</td>
                                            <td>{{ substr($user->nomor_telepon, 0, 3) . str_repeat('*', strlen($user->nomor_telepon) - 6) . substr($user->nomor_telepon, -3) }}</td>
                                            <td>{{ $user->alamat }}</td>
                                            <td>{{ $user->pesanan->count() }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" id="editPasswordBtn">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" align="center">Data Kosong</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <!-- Content Row -->
                   
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
<script>
    // Ambil referensi tombol "Edit" dan form untuk mengganti password
    var editPasswordBtn = document.getElementById('editPasswordBtn');
    var changePasswordForm = document.getElementById('changePasswordForm');

    // Tambahkan event listener untuk menangkap klik pada tombol "Edit"
    editPasswordBtn.addEventListener('click', function(event) {
        event.preventDefault();

        // Toggle tampilan form mengganti password
        if (changePasswordForm.style.display === 'none') {
            changePasswordForm.style.display = 'block';
        } else {
            changePasswordForm.style.display = 'none';
        }
    });
</script>


