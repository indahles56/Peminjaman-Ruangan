<<<<<<< HEAD
<?php
<<<<<<< HEAD
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memperoleh data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memeriksa keberadaan pengguna dalam database
    $query = "SELECT * FROM users WHERE username = :username";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        echo "Login berhasil.";
    } else {
        echo "Username atau password salah.";
    }
}
?>

<!-- Form Login -->
<form method="POST" action="login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <input type="submit" value="Login">
</form>
=======
defined('BASEPATH') OR exit('No direct script access allowed');
?>
=======
>>>>>>> 954216e8e836aadd45ee6bdaf748d5e880499a61
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Ke Peminjaman Ruangan</title>
	<!-- AdminLTE v3 CSS -->
	<link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
	<!-- AdminLTE v3 JS -->
	<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url() ?>">Aplikasi Peminjaman Ruangan</a>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<!-- Cek jika registrasi sukses -->
				<?php if (session()->has('success')) : ?>
					<div class="alert alert-success">
						<?= session('success') ?>
					</div>
				<?php endif; ?>
				<!-- Cek jika login gagal -->
				<?php if (session()->has('errors')) : ?>
					<div class="alert alert-danger mt-3">
						<?= (session('errors')) ?>
					</div>
				<?php endif; ?>

				<p class="login-box-msg">Sign in to start your session</p>
				<!-- Login form -->
				<form action="<?= base_url('admin/login') ?>" method="post">
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control" placeholder="Email" autofocus="true" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
					</div>
				</form>
				<!-- End of login form -->
				<p class="mb-1">
					<a href="#">I forgot my password</a>
				</p>
				<p class="mb-1">
					<a href="register">Register For User</a>
				</p>

			</div>
		</div>
	</div>
</body>
<<<<<<< HEAD
</html>
>>>>>>> 5ef08f7a5349b820221a64f248d25bb848681c20
=======

</html>
>>>>>>> 954216e8e836aadd45ee6bdaf748d5e880499a61
