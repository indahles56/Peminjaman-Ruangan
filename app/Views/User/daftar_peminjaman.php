<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body background="https://blusignalsystems.com/wp-content/uploads/2016/12/Savin-NY-Website-Background-Web1.jpg">
    <!-- Content Header -->
    <?php include('layouts/header.php'); ?>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pengajuan Peminjaman Anda</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Pinjam</th>
                        <th>Kode Ruang</th>
                        <th>Nama Peminjam</th>
                        <th>Tujuan</th>
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
                    <?php foreach ($bookings as $booking) : ?>
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
                                <?= $booking['keterangan'] ?>
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
                                <button class="btn btn-sm btn-danger cancel-button" data-id="<?= $booking['kode_pinjam'] ?>" data-bs-toggle="modal" data-bs-target="#cancelModal" <?= ($booking['status'] != 'Pending') ? 'disabled' : '' ?>>
                                    Batalkan
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include the Bootstrap modal markup -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Cancel Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin membatalkan pengajuan peminjaman ini?</p>
                    <p>ID Peminjaman : <span id="bookingIdText"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" id="confirmCancelBtn">Ya, batalkan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.cancel-button').click(function() {
                var bookingId = $(this).data('id');
                console.log(bookingId);
                $('#bookingIdText').text(bookingId);

                $('#confirmCancelBtn').click(function(e) {

                    console.log(bookingId);

                    $.ajax({
                        url: 'cancel-booking',
                        type: 'POST',
                        data: {
                            'id': bookingId
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(response) {
                            // Error occurred during the AJAX request
                            alert(response.message + 'error');
                        }
                    });

                    // Close the modal after confirmation
                    $('#cancelModal').modal('hide');
                });
            })
        })
    </script>

    <script>
        // Get the current page URL
        var currentUrl = window.location.href;

        // Get the list of navbar links
        var navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Loop through each link and check if the URL matches
        navbarLinks.forEach(function(link) {
            if (link.href === currentUrl) {
                link.classList.add('active'); // Add the 'active' class to the matching link
            }
        });
    </script>

    <script>
        $('#cancel-button').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            var data = {
                'id': id
            };
            console.log(data);
            // $kirim request degnan ajax
            $.ajax({
                url: 'cancel-booking',
                type: 'POST',
                data: data,
                success: function(response) {
                    // Handle the response data
                    console.log(response);

                    alert(response.message);
                    document.getElementById('book-form').reset();
                },
                error: function(xhr, status, error) {
                    // Handle the error if any
                    console.log(error);
                }
            })
        })
    </script>

</body>

</html>