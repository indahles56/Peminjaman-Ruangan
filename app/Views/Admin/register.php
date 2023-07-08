<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Ke Peminjaman Ruangan</title>
  <!-- AdminLTE v3 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <!-- AdminLTE v3 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Peminjaman</b> Ruangan</a>
    </div>

    <!-- Registration Form -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Registrasi Pengguna Baru</p>

        <form class="register-form" action="proses-registrasi.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</body>

</html>
