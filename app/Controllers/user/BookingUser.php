<?php
// File: user/create_booking.php

// Verifikasi otorisasi pengguna di sini
// Misalnya, periksa apakah pengguna yang masuk memiliki peran 'user'
// Jika tidak, arahkan ke halaman login atau halaman lain yang sesuai

// Mulai sesi atau validasi token di sini (jika digunakan)

// Sisipkan file db.php untuk koneksi ke database
require_once '../db.php';

// Fungsi untuk membuat pemesanan ruangan baru
function createBooking($roomId, $userId, $startTime, $endTime)
{
    global $conn;
    $roomId = $conn->real_escape_string($roomId);
    $userId = $conn->real_escape_string($userId);
    $startTime = $conn->real_escape_string($startTime);
    $endTime = $conn->real_escape_string($endTime);

    // Lakukan validasi waktu pemesanan di sini (misalnya, pastikan waktu mulai lebih kecil dari waktu selesai)

    // Lakukan validasi ketersediaan ruangan di sini (misalnya, pastikan ruangan tidak telah dipesan pada rentang waktu yang sama)

    // Lakukan validasi lainnya sesuai kebutuhan aplikasi Anda

    // Simpan pemesanan ke database
    $sql = "INSERT INTO bookings (room_id, user_id, start_time, end_time) VALUES ('$roomId', '$userId', '$startTime', '$endTime')";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Proses permintaan
// Dapatkan data pengguna yang masuk dari sesi atau token (jika digunakan)
$loggedInUserId = 1; // Ganti dengan cara Anda mendapatkan ID pengguna yang masuk

// Ambil data yang dikirimkan melalui form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = $_POST['room_id'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];

    if (createBooking($roomId, $loggedInUserId, $startTime, $endTime)) {
        // Redirect ke halaman sukses setelah berhasil membuat pemesanan
        header('Location: success.php');
    } else {
        // Tampilkan pesan error jika gagal membuat pemesanan
        echo "Gagal membuat pemesanan.";
    }
}

// Dapatkan daftar ruangan yang tersedia (misalnya, ruangan yang belum dipesan pada rentang waktu yang diinginkan)
// Anda dapat menambahkan fungsi atau query yang sesuai untuk mendapatkan daftar ruangan yang tersedia

?>

<!-- Tampilkan HTML untuk form pemesanan -->
<!DOCTYPE html>
<html>
<head>
    <title>Buat Pemesanan Ruangan</title>
</head>
<body>
    <h1>Buat Pemesanan Ruangan</h1>
    <form action="create_booking.php" method="POST">
        <label for="room_id">Ruangan:</label>
        <select name="room_id" id="room_id">
            <!-- Tampilkan opsi ruangan yang tersedia -->
            <option value="1">Ruangan 1</option>
            <option value="2">Ruangan 2</option>
            <!-- Tambahkan opsi ruangan lainnya sesuai kebutuhan aplikasi Anda -->
        </select>
        <br><br>
        <label for="start_time">Waktu Mulai:</label>
        <input type="datetime-local" name="start_time" id="start_time">
        <br><br>
        <label for="end_time">Waktu Selesai:</label>
        <input type="datetime-local" name="end_time" id="end_time">
        <br><br>
        <input type="submit" value="Buat Pemesanan">
    </form>
</body>
</html>
