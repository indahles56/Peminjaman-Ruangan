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
                        <th>Nama Peminjam</th>
                        <th>Status</th>
                        <th>Waktu Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Status</th>
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
                                <?= $booking['username'] ?>
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
                                <?= $booking['status'] ?>
                            </td>
                            <td>
                                <button
                                    class="btn btn-sm btn-success action-button<?= ($booking['status'] === 'cancel') ? ' disabled' : '' ?>"
                                    data-id="<?= $booking['kode_pinjam'] ?>" data-status="approve">Setujui</button>
                                <button
                                    class="btn btn-sm btn-danger action-button<?= ($booking['status'] === 'cancel') ? ' disabled' : '' ?>"
                                    data-id="<?= $booking['kode_pinjam'] ?>" data-status="deny">Tolak</button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $(document).ready(function () {
        $('.action-button').click(function (e) {
            var bookingId = $(this).data('id');
            var status = $(this).data('status');
            console.log(bookingId);
            var url = 'update-booking';
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'id': bookingId,
                    'status': status
                },
                success: function (response) {
                    $('#content').load('bookings');
                },
                error: function (response) {
                    // Error occurred during the AJAX request
                    alert(response.message + 'error');
                }
            });
        });
    });

</script>
