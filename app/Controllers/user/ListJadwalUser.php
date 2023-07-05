<?php
// File: schedules.php

// Verifikasi otorisasi pengguna di sini
// Misalnya, periksa apakah pengguna yang masuk memiliki akses yang sesuai
// Jika tidak, arahkan ke halaman login atau halaman lain yang sesuai

// Mulai sesi atau validasi token di sini (jika digunakan)

// Sisipkan file db.php untuk koneksi ke database
require_once 'db.php';

// Fungsi untuk mendapatkan daftar jadwal peminjaman ruangan
function getSchedules()
{
    global $conn;
    $sql = "SELECT b.*, r.name as room_name, u.username
            FROM bookings b
            INNER JOIN rooms r ON b.room_id = r.id
            INNER JOIN users u ON b.user_id = u.id
            ORDER BY b.start_time ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Memanggil fungsi getSchedules untuk mendapatkan daftar jadwal
$schedules = getSchedules();
?>

<!-- Tampilkan HTML untuk daftar jadwal -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Jadwal Peminjaman Ruangan</title>
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
    <h1>Daftar Jadwal Peminjaman Ruangan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Pengguna</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            foreach ($schedules as $schedule) {
                echo "<tr>";
                echo "<td>".$counter."</td>";
                echo "<td>".$schedule['room_name']."</td>";
                echo "<td>".$schedule['username']."</td>";
                echo "<td>".$schedule['start_time']."</td>";
                echo "<td>".$schedule['end_time']."</td>";
                echo "</tr>";
                $counter++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
