<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body background="https://blusignalsystems.com/wp-content/uploads/2016/12/Savin-NY-Website-Background-Web1.jpg">
    <!-- Content Header -->
    <?php include('layouts/header.php'); ?>
    <!-- /.content-header -->

    <!-- Main Content -->
    <div class="row-cols-2">
        <div class="relative" style="position: relative; left: 30px; top:80px; width: 50vw;">
            <h1 style="margin-bottom: 20px;">Haloo</h1>
            <h3 class="card-header" style="margin-bottom: 20px;">Selamat Datang!!</h3>
            <h3 class="card-header">Silahkan mulai pengajuan peminjaman ruangan anda!</h3>
        </div>
        <div class="row relative" style="position: relative; left: 60vw; width: 30vw;">
            <div class="card text-center col-md-6" style="width: 40rem;">
                <h5 class="card-header">Pinjam Ruangan</h5>
                <div class="card-body">
                    <form id="book-form">
                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap:</label>
                            <div class="col-sm-8">
                                <input value="<?= session('user_id') ?>" type="text" id="nama_lengkap" name="user_id"
                                    class="form-control" hidden>
                                <input value="<?= session('user_name') ?>" type="text" id="nama_lengkap" name="name"
                                    class="form-control" required disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pilih_ruangan" class="col-sm-4 form-label">Pilih Ruangan:</label>
                            <div class="col-sm-8">
                                <select id="pilih_ruangan" name="room_id" class="form-control" required>
                                    <?php foreach ($rooms as $room) { ?>
                                        <option value="<?= $room['id'] ?>"><?= $room['kode_ruang'] . ' : ' . $room['nama_ruang'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal" class="col-sm-4 form-label">Tanggal:</label>
                            <div class="col-sm-8">
                                <input type="date" id="tanggal" name="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jam_mulai" class="col-sm-4 form-label">Jam Mulai:</label>
                            <div class="col-sm-8">
                                <input type="time" id="jam_mulai" name="start_time" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jam_selesai" class="col-sm-4 form-label">Jam Selesai:</label>
                            <div class="col-sm-8">
                                <input type="time" id="jam_selesai" name="end_time" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-4 form-label">Keterangan:</label>
                            <div class="col-sm-8">
                                <textarea id="keterangan" name="note" class="form-control" rows="3"
                                    placeholder="Isi dengan tujuan peminjaman, misal rapat." required></textarea>
                            </div>
                        </div>
                        <!-- Add form elements for booking a room here -->
                        <button type="submit" id="submit-button" class="btn btn-primary">PINJAM SEKARANG</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="wrapper" id="content">
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /.content -->

    <!-- build the navbar -->
    <script>
        // Get the current page URL
        var currentUrl = window.location.href;

        // Get the list of navbar links
        var navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Loop through each link and check if the URL matches
        navbarLinks.forEach(function (link) {
            if (link.href === currentUrl) {
                link.classList.add('active'); // Add the 'active' class to the matching link
            }
        });
    </script>

    <!-- submit form -->
    <script>
        $(document).ready(function () {
            $('#book-form').submit(function (e) {
                e.preventDefault();
                data = $(this).serialize();
                console.log(data);
                $.ajax({
                    url: 'process-booking', // Replace with the actual URL to your PHP controller
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        // Handle the response data
                        alert('Peminjaman Sukses Diajukan');
                        document.getElementById('book-form').reset();
                    },
                    error: function (xhr, status, error) {
                        // Handle the error if any
                        console.log(error);
                    }
                })
            });
        });
    </script>
</body>

</html>
