<?php
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
