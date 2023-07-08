<!DOCTYPE html>
<html>
<head>
    <title>User Registration - Peminjaman Ruang Kelas</title>
</head>
<body>
    <h1>User Registration</h1>
    
    <?php
    // Check if registration form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Perform registration process
        
        // Validate and sanitize the input data (you may add more validation as per your requirements)
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Store the registration details in the database or any other data source
        // ... your code to insert the user registration data into the database ...
        
        // Redirect to the user login page after successful registration
        header('Location: login.php');
        exit;
    }
    ?>
    
    <!-- User registration form -->
    <form action="register.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
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
