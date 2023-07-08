<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ruangan</title>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body>
    <header>
        <h1>Daftar Ruangan</h1>
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                </tr>
                <?php foreach ($ruangan as $row) : ?>
                    <tr>
                        <td><?= $row['no'] ?></td>
                        <td><?= $row['kode_barang'] ?></td>
                        <td><?= $row['nama_barang'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Tidak ada data ruangan.</p>
        <?php endif; ?>
    </main>
</body>
</html>
