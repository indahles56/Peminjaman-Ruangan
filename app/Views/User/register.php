<!DOCTYPE html>
<html>
<head>
  <title>User Registration - Peminjaman Ruang</title>
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
	<!-- AdminLTE v3 JS -->
	<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="<?= base_url('/') ?>"><b>Peminjaman</b> Ruang</a>
    </div>
<div class="card">
  <div class="card-body register-card-body">
    <p class="login-box-msg">Registrasi Pengguna Baru</p>

    <form action="<?= base_url('registrasi/proses') ?>" method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="fullname" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirm_password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <a href="<?= base_url('login') ?>" class="text-center">Sudah memiliki akun? Masuk</a>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
      </div>
    </form>
  </div>
</div>
  </div>
  <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>