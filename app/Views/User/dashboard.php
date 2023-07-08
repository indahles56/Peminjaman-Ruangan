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
      <!-- Tambahkan konten navbar di sini -->
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Tambahkan konten sidebar di sini -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <!-- Tambahkan konten header di sini -->
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <h2>Selamat datang di Pinjam Ruang!</h2>
          <h2>Pinjam Ruangan Mudah dan Cepat</h2>
          <a href="<?= base_url('user/booking') ?>">Buat Booking</a>
          <h1>Booking Disini</h1>
          <form action="<?= base_url('user/processBooking') ?>" method="POST">
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap:</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
              <label for="pilih_ruangan">Pilih Ruangan:</label>
              <input type="text" class="form-control" id="pilih_ruangan" name="pilih_ruangan" required>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal:</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
              <label for="jam_mulai">Jam Mulai:</label>
              <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
            </div>
            <div class="form-group">
              <label for="jam_selesai">Jam Selesai:</label>
              <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan:</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            </div>
            <button type="submit" class="btn btn-primary">BOOKING</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Tambahkan konten footer di sini -->
    </footer>
  </div>

  <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
