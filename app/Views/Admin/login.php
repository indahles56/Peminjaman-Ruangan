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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $hal; ?> · Pinjam Ruangan </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css'); ?>">
	<link rel="icon" href="<?php echo base_url('assets/img/form.png'); ?>">
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/login.js'); ?>"></script>
</head>
<body>

	<div class="container-fluid">

		<div class="row baris-utama">

			<!-- Kolom Offset -->
			<div class="col-sm-2-offset col-sm-2"></div>
			<!-- Kolom Offset -->

			<div class="col-sm-8 kotak-login clearfix">
				<!-- Kolom Gambar Selamat Datang -->
				<div class="gambar-login">
					<p>Selamat <br><b>datang<font color="ffc000">.</font></b></p>
				</div>
				<!-- Kolom Gambar Selamat Datang -->
				
				<!-- Form Login -->
				<div class="login-form">
					<img src="<?php echo base_url('assets/img/form.png'); ?>">
					<h3>Peminjaman Kelas</h3>

					<?php echo form_open('login/proses'); ?>
					<ul>
						<li>
							<input type="text" name="username" placeholder="Email" required />
						</li>
						<li>
							<input type="password" name="password" placeholder="Password" required />
						</li>
						<li>
							<input type="submit" name="tombol_login" value="Login" />
						</li>
                        <hr width="20%" align="left"> OR <hr width="20%" align="right">
                        <li>
                            <input type="submit" name="tombol_regist" value="Registrasi" />
                        </li>
					</ul>
					<?php echo form_close(); ?>
				</div>
				<!-- Form Login -->
			</div>
			
		</div>

		<div class="row baris-footer">
			<!-- Kolom Copyright -->
			<div class="col-sm-12">&copy; 2021-<?php echo date('Y'); ?> Pinjam Kelas</div>
			<!-- Kolom Copyright -->
		</div>

	</div>

</body>
</html>
>>>>>>> 5ef08f7a5349b820221a64f248d25bb848681c20
