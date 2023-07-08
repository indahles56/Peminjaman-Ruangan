<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body>
    <header>
        <h1>Dashboard User</h1>
    </header>
    <nav>
        <!-- Tambahkan menu navigasi di sini -->
    </nav>
    <main>
        <h2>Selamat datang di Pinjam Ruang !</h2>
        <h2>Pinjam Ruangan Mudah dan Cepat</h2>
        <a href="<?= base_url('user/booking') ?>">Buat Booking</a>
    <title>Booking Disini</title>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body>
    <header>
        <h1>Booking Disini</h1>
    </header>
    <main>
        <form action="<?= base_url('user/processBooking') ?>" method="POST">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
            <label for="pilih_ruangan">Pilih Ruangan:</label>
            <input type="text" id="pilih_ruangan" name="pilih_ruangan" required>
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>
            <label for="jam_mulai">Jam Mulai:</label>
            <input type="date" id="jam_mulai" name="jam_mulai" required>
            <label for="jam_selesai">Jam Selesai:</label>
            <input type="date" id="jam_selesai" name="jam_selesai" required>
            <label for="keterangan">Keterangan:</label>
            <input type="text" id="keterangan" name="keterangan" required>
            <!-- Tambahkan elemen form untuk booking ruangan di sini -->
            <button type="submit">BOOKING</button>
        </form>
    </main>
</body>
</html>