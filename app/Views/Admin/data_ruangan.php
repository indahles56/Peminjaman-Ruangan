<!DOCTYPE html>
<html>
<head>
    <title>Data Ruangan</title>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body>
    <header>
        <h1>Data Ruangan</h1>
    </header>
    <nav>
        <!-- Tambahkan menu navigasi di sini -->
    </nav>
    <main>
        <h2>Daftar Ruangan</h2>
        <?php if (!empty($ruangan)) : ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Kode Ruang</th>
                    <th>Nama Ruang</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($ruangan as $row) : ?>
                    <tr>
                        <td><?= $row['no'] ?></td>
                        <td><?= $row['kode_barang'] ?></td>
                        <td><?= $row['nama_ruang'] ?></td>
                        <td><?= $row['aksi'] ?></td>
                        <td>
                            <a href="<?= base_url('user/edit-ruangan/' . $row['id']) ?>">Edit</a> |
                            <a href="#">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Tidak ada data ruangan.</p>
        <?php endif; ?>
        
        <h2>Tambah Ruangan</h2>
        <form action="<?= base_url('user/process-tambah-ruangan') ?>" method="POST">
            <label for="nama">Nama Ruangan:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>
            <button type="submit">Tambah</button>
        </form>
    </main>
</body>
</html>