<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memperoleh data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Menyimpan data ke database
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':email', $email);
    
    if ($statement->execute()) {
        echo "Registrasi berhasil.";
    } else {
        echo "Registrasi gagal.";
    }
}
?>

<!-- Form Registrasi -->
<form method="POST" action="register.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <input type="submit" value="Register">
</form>
