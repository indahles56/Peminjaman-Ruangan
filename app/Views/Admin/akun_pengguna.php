<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Peminjaman Ruang</title>
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar content -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/akun_pengguna') ?>">Akun Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/ruang') ?>">Ruang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/peminjaman_ruang') ?>">Peminjaman Ruang</a>
                </li>
                <!-- Tambahkan menu lainnya jika diperlukan -->
            </ul>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">Admin Panel - Peminjaman Ruang</h1>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h2>Data Peminjaman Ruang</h2>
                    <!-- Tampilkan data peminjaman ruang sesuai kebutuhan -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pengguna</th>
                                <th>Ruang</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Durasi (jam)</th>
                                <!-- Tambahkan kolom lainnya jika diperlukan -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peminjaman_ruang as $peminjaman) : ?>
                                <tr>
                                    <td><?= $peminjaman['id'] ?></td>
                                    <td><?= $peminjaman['nama_pengguna'] ?></td>
                                    <td><?= $peminjaman['ruang'] ?></td>
                                    <td><?= $peminjaman['tanggal_peminjaman'] ?></td>
                                    <td><?= $peminjaman['durasi'] ?></td>
                                    <!-- Tambahkan kolom lainnya jika diperlukan -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>