<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    
    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard User</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2>Selamat datang di Pinjam Ruang !</h2>
                            <h2>Pinjam Ruangan Mudah dan Cepat</h2>
                            <a href="<?= base_url('user/booking') ?>">Buat Booking</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= base_url('user/processBooking') ?>" method="POST">
                                <label for="nama_lengkap">Nama Lengkap:</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                                <label for="pilih_ruangan">Pilih Ruangan:</label>
                                <input type="text" id="pilih_ruangan" name="pilih_ruangan" required>
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" id="tanggal" name="tanggal" required>
                                <label for="jam_mulai">Jam Mulai:</label>
                                <input type="date" id="jam_mulai" name="jam_mulai" required>
                                <label for="jam_selesai">Jam Selesai:</label>
                                <input type="date" id="jam_selesai" name="jam_selesai" required>
                                <label for="keterangan">Keterangan:</label>
                                <input type="text" id="keterangan" name="keterangan" required>
                                <!-- Tambahkan elemen form untuk booking ruangan di sini -->
                                <button type="submit">BOOKING</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>
</html>
