<!DOCTYPE html>
<html>

<head>
    <title>Kelola Pengguna</title>
</head>

<body>
    <h1>Daftar Pengguna</h1>

    <?php
    // Contoh data pengguna
    $pengguna = [
        [
            'nama_lengkap' => 'John Doe',
            'email' => 'johndoe@example.com'
        ],
        [
            'nama_lengkap' => 'Jane Smith',
            'email' => 'janesmith@example.com'
        ],
        [
            'nama_lengkap' => 'Michael Johnson',
            'email' => 'michaeljohnson@example.com'
        ]
    ];
    ?>

    <table>
        <tr>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($pengguna as $data) : ?>
            <tr>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td>
                    <!-- Tambahkan aksi sesuai kebutuhan -->
                    <a href="#">Edit</a>
                    <a href="#">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
