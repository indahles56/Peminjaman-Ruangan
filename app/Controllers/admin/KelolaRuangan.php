<?php
// File: admin/rooms.php

// Verifikasi otorisasi admin di sini
// Misalnya, periksa apakah pengguna yang masuk memiliki peran 'admin'
// Jika tidak, arahkan ke halaman login atau halaman lain yang sesuai

// Mulai sesi atau validasi token di sini (jika digunakan)

// Sisipkan file db.php untuk koneksi ke database
require_once '../db.php';

// Fungsi untuk mendapatkan daftar ruangan
function getRooms()
{
    global $conn;
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Fungsi untuk membuat ruangan baru
function createRoom($name, $description)
{
    global $conn;
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);

    $sql = "INSERT INTO rooms (name, description) VALUES ('$name', '$description')";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk mengedit ruangan
function editRoom($id, $name, $description)
{
    global $conn;
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);

    $sql = "UPDATE rooms SET name='$name', description='$description' WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus ruangan
function deleteRoom($id)
{
    global $conn;

    // Pastikan tidak ada peminjaman yang terkait dengan ruangan sebelum dihapus
    $sql = "SELECT * FROM bookings WHERE room_id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return false; // Ada peminjaman yang terkait dengan ruangan
    } else {
        $sql = "DELETE FROM rooms WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

// Proses permintaan berdasarkan aksi yang dikirim melalui parameter GET atau POST
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    case 'create':
        $name = $_POST['name'];
        $description = $_POST['description'];

        if (createRoom($name, $description)) {
            // Redirect ke halaman daftar ruangan setelah berhasil membuat ruangan baru
            header('Location: rooms.php');
        } else {
            // Tampilkan pesan error jika gagal membuat ruangan
            echo "Gagal membuat ruangan.";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        if (editRoom($id, $name, $description)) {
            // Redirect ke halaman daftar ruangan setelah berhasil mengedit ruangan
            header('Location: rooms.php');
        } else {
            // Tampilkan pesan error jika gagal mengedit ruangan
            echo "Gagal mengedit ruangan.";
        }
        break;

    case 'delete':
        $id = $_GET['id'];

        if (deleteRoom($id)) {
            // Redirect ke halaman daftar ruangan setelah berhasil menghapus ruangan
            header('Location: rooms.php');
        } else {
            // Tampilkan pesan error jika gagal menghapus ruangan
            echo "Gagal menghapus ruangan. Pastikan tidak ada peminjaman terkait.";
        }
        break;

    default:
        // Menampilkan halaman daftar ruangan
        $rooms = getRooms();
        // Tampilkan HTML dan loop melalui $rooms untuk menampilkan ruangan
        // Anda dapat menggunakan template engine atau langsung menuliskan HTML di sini
        break;
}
?>
