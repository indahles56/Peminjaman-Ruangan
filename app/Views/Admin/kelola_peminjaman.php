<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 h5">
                Kelola Bookings
            </div>
        </div>
    </div>
</section>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Booking List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Pinjam</th>
                        <th>Kode Ruang</th>
                        <th>Nama Kegiatan</th>
                        <th>Status</th>
                        <th>Waktu Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>User</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the bookings data and generate table rows -->
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td>
                                <?= $booking['kode_pinjam'] ?>
                            </td>
                            <td>
                                <?= $booking['kode_ruang'] ?>
                            </td>
                            <td>
                                <?= $booking['nama_kegiatan'] ?>
                            </td>
                            <td>
                                <?= $booking['status'] ?>
                            </td>
                            <td>
                                <?= $booking['waktu_pengajuan'] ?>
                            </td>
                            <td>
                                <?= $booking['tanggal'] ?>
                            </td>
                            <td>
                                <?= $booking['waktu_mulai'] ?>
                            </td>
                            <td>
                                <?= $booking['waktu_selesai'] ?>
                            </td>
                            <td>
                                <?= $booking['user'] ?>
                            </td>
                            <td>
                                <?= $booking['admin'] ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger">Tolak</button>
                                <button class="btn btn-sm btn-success">Setujui</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->