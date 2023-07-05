<?php
// File: user/dashboard.php

// Verifikasi otorisasi pengguna di sini
// Misalnya, periksa apakah pengguna yang masuk memiliki peran 'user'
// Jika tidak, arahkan ke halaman login atau halaman lain yang sesuai

// Mulai sesi atau validasi token di sini (jika digunakan)

// Sisipkan file db.php untuk koneksi ke database
require_once '../db.php';

// Fungsi untuk mendapatkan daftar pemesanan ruangan oleh pengguna tertentu
function getUserBookings($userId)
{
    global $conn;
    $userId = $conn->real_escape_string($userId);
    $sql = "SELECT b.*, r.name as room_name
            FROM bookings b
            INNER JOIN rooms r ON b.room_id = r.id
            WHERE b.user_id = '$userId'
            ORDER BY b.start_time ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Proses permintaan
// Dapatkan data pengguna yang masuk dari sesi atau token (jika digunakan)
$loggedInUserId = 1; // Ganti dengan cara Anda mendapatkan ID pengguna yang masuk

// Memanggil fungsi getUserBookings untuk mendapatkan daftar pemesanan pengguna
$bookings = getUserBookings($loggedInUserId);
?>

<!-- Tampilkan HTML untuk dashboard pengguna -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Dashboard User</h1>
    <h2>Daftar Pemesanan Ruangan Anda</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            foreach ($bookings as $booking) {
                echo "<tr>";
                echo "<td>".$counter."</td>";
                echo "<td>".$booking['room_name']."</td>";
                echo "<td>".$booking['start_time']."</td>";
                echo "<td>".$booking['end_time']."</td>";
                echo "</tr>";
                $counter++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
