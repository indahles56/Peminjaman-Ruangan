<?php
// File: admin/bookings.php

// Verifikasi otorisasi admin di sini
// Misalnya, periksa apakah pengguna yang masuk memiliki peran 'admin'
// Jika tidak, arahkan ke halaman login atau halaman lain yang sesuai

// Mulai sesi atau validasi token di sini (jika digunakan)

// Sisipkan file db.php untuk koneksi ke database
require_once '../db.php';

// Fungsi untuk mendapatkan daftar pemesanan
function getBookings()
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

// Fungsi untuk menghapus pemesanan
function deleteBooking($id)
{
    global $conn;
    $sql = "DELETE FROM bookings WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Proses permintaan berdasarkan aksi yang dikirim melalui parameter GET atau POST
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    case 'delete':
        $id = $_GET['id'];

        if (deleteBooking($id)) {
            // Redirect ke halaman daftar pemesanan setelah berhasil menghapus pemesanan
            header('Location: bookings.php');
        } else {
            // Tampilkan pesan error jika gagal menghapus pemesanan
            echo "Gagal menghapus pemesanan.";
        }
        break;

    default:
        // Menampilkan halaman daftar pemesanan
        $bookings = getBookings();
        // Tampilkan HTML dan loop melalui $bookings untuk menampilkan daftar pemesanan
        // Anda dapat menggunakan template engine atau langsung menuliskan HTML di sini
        break;
}
?>
