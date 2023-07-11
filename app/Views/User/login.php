<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- AdminLTE v3 CSS -->
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- AdminLTE v3 JS -->
    <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
    <title>Login</title>
</head>

<body background="assets/upb.jpg" class="custom-bg">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div clas="login-text">
                <h1>
                    Selamat Datang Di Website Peminjaman Ruang Kelas!!
                </h1>
                <h3>
                    Silahkan Login Untuk Mengajukan Peminjaman
                </h3>
            </div>
            <div class="col-md-6">
                <div class="card login-card">
                    <!-- Cek jika registrasi sukses -->
                    <?php if (session()->has('success')): ?>
                        <div class="alert alert-success">
                            <?= session('success') ?>
                        </div>
                    <?php endif; ?>
                    <!-- Cek jika login gagal -->
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger mt-3">
                            <?= (session('errors')) ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form id="user-login-form" action="<?= base_url('login') ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    autofocus="true" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <hr class="or-divider-line">
                                </div>
                                <div class="col-auto">
                                    <span class="or-divider-text" style="color:grey">or</span>
                                </div>
                                <div class="col">
                                    <hr class="or-divider-line">
                                </div>
                            </div>
                            <div class="card-body d-grid gap-2">
                                <a href="register" class="btn btn-secondary">Register</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="admin/login" class="text-center">Login as Admin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
