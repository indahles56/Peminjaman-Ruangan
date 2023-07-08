<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
	<!-- AdminLTE v3 JS -->
	<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard User</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Menu Navigasi -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Selamat datang di Pinjam Ruang!</h1>
                            <h2>Pinjam Ruangan Mudah dan Cepat</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h1>Booking Disini</h1>
                            <form action="<?= base_url('user/processBooking') ?>" method="POST">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pilih_ruangan">Pilih Ruangan:</label>
                                    <input type="text" id="pilih_ruangan" name="pilih_ruangan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai:</label>
                                    <input type="date" id="jam_mulai" name="jam_mulai" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai:</label>
                                    <input type="date" id="jam_selesai" name="jam_selesai" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <input type="text" id="keterangan" name="keterangan" class="form-control" required>
                                </div>
                                <!-- Tambahkan elemen form untuk booking ruangan di sini -->
                                <button type="submit" class="btn btn-primary">BOOKING</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
</body>
</html>