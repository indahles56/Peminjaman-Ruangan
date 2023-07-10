<!-- Tabel Data User [Awal] -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Ke Peminjaman Ruangan</title>
  <!-- AdminLTE v3 CSS -->
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
  <!-- AdminLTE v3 JS -->
  <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</head>

<body>
  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Kode Peminjaman</th>
        <th>Pengguna</th>
        <th>Ruangan</th>
        <th>Tanggal</th>
        <th>Waktu Pengguna</th>
        <th>Waktu Selesai</th>
        <th>Keterangan</th>
        <th>Status Peminjaman</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($tb as $user): ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td><?php echo $user['fullname']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['level']; ?></td>
        <td><?php echo $user['tanggal']; ?></td>
        <td><?php echo $user['waktu_mulai']; ?></td>
        <td><?php echo $user['waktu_selesai']; ?></td>
        <td><?php echo $user['keterangan']; ?></td>
        <td><?php echo $user['status_peminjaman']; ?></td>
        <td align="center">
          <div class="btn-group">
            <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#suntinguser<?php echo $user['username']; ?>" data-backdrop="static">Sunting</a>
            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapususer<?php echo $user['username']; ?>" data-backdrop="static">Hapus</a>
          </div>
        </td>
      </tr>
      <?php $no++; endforeach; ?>
    </tbody>
  </table>
  <!-- Tabel Data User [Akhir] -->

  <!-- Modal Buat User [Awal] -->
  <div id="buatuser" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Konten Modal [Awal] -->
      <div class="modal-content">
        <div class="modal-header">
          Buat Akun Baru
          <button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
        </div>

        <div class="modal-body">
          <?php echo form_open('dashboard/buat-user'); ?>
          <ul>
            <li>
              <div><i class="lnr lnr-text-format"></i></div><input type="text" name="fullname" placeholder="Nama lengkap" required>
            </li>
            <li>
              <div><i class="lnr lnr-user"></i></div><input type="text" name="username" placeholder="Username" required>
            </li>
            <li>
              <div><i class="lnr lnr-lock"></i></div><input type="password" name="password" placeholder="Password" required>
            </li>
            <li>
              <input type="submit" value="Daftar">
            </li>
          </ul>
          <?php echo form_close(); ?>
        </div>
      </div>
      <!-- Konten Modal [Akhir] -->
    </div>
  </div>
  <!-- Modal Buat User [Akhir] -->
</body>

</html>
