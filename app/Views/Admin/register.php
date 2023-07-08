<div class="container">
  <h2>Registrasi Pengguna Baru</h2>
  <form class="register-form" action="proses-registrasi.php" method="POST">
    <div class="form-group">
      <label for="fullname">Nama Lengkap</label>
      <input type="text" id="fullname" name="fullname" required>
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
      <label for="confirm-password">Konfirmasi Password</label>
      <input type="password" id="confirm-password" name="confirm_password" required>
    </div>
    <button type="submit">Daftar</button>
  </form>
</div>
