<!DOCTYPE html>
<html>
<head>
    <title>Daftar Booking Ruangan</title>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body>
    <header>
        <h1>Daftar Booking Ruangan</h1>
    </header>
    <nav>
        <!-- Tambahkan menu navigasi di sini -->
    </nav>
    <main>
        <h2>Daftar Booking Ruangan</h2>
        <?php if (!empty($booking)) : ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Kode Pinjam</th>
                    <th>Kode Barang</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($booking as $row) : ?>
                    <tr>
                        <td><?= $row['no'] ?></td>
                        <td><?= $row['kode_pinjam'] ?></td>
                        <td><?= $row['kode_ruang'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['waktu_mulai'] ?></td>
                        <td><?= $row['waktu_selesai'] ?></td>
                        <td><?= $row['kelas'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['aksi'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Tidak ada data booking ruangan.</p>
        <?php endif; ?>
    </main>
</body>
</html>