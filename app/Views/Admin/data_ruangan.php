<!DOCTYPE html>
<html>
<head>
    <title>Data Ruangan</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
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
                            <h1 class="m-0">Data Ruangan</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2>Daftar Ruangan</h2>
                            <?php if (!empty($ruangan)) : ?>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Ruang</th>
                                                    <th>Nama Ruang</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ruangan as $row) : ?>
                                                    <tr>
                                                        <td><?= $row['no'] ?></td>
                                                        <td><?= $row['kode_barang'] ?></td>
                                                        <td><?= $row['nama_ruang'] ?></td>
                                                        <td><?= $row['aksi'] ?></td>
                                                        <td>
                                                            <a href="<?= base_url('user/edit-ruangan/' . $row['id']) ?>">Edit</a> |
                                                            <a href="#">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p>Tidak ada data ruangan.</p>
                            <?php endif; ?>
                            
                            <h2>Tambah Ruangan</h2>
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?= base_url('user/process-tambah-ruangan') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="nama">Nama Ruangan:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <input type="text" class="form-control" id="status" name="status" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>