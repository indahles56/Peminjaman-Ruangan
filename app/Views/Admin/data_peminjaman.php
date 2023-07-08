<!-- Tabel Data User [Awal] -->
<table>
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
      <div class="table-actions">
        <div class="button-edit">
          <a href="" data-toggle="modal" data-target="#suntinguser<?php echo $user['username']; ?>" data-backdrop="static">Sunting</a>
        </div>
        <div class="button-delete">
          <a href="" data-toggle="modal" data-target="#hapususer<?php echo $user['username']; ?>" data-backdrop="static">Hapus</a>
        </div>
      </div>
    </td>
  </tr>
  <?php $no++; endforeach; ?>
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
            <div><i class="lnr lnr-text-format"></i></div><input type="text" name="fullname" placeholder="Nama lengBerikut adalah kode CSS yang dapat Anda gunakan untuk desain registrasi:
              <!DOCTYPE html>
<html>
<head>
  <title>Registrasi</title>
  <link rel="stylesheet" type="text/css" href="registrasi.css">
</head>
<body>
  <div class="container">
    <h1>Registrasi</h1>
    <form action="" method="post">
      <input type="text" name="fullname" placeholder="Nama lengkap" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Daftar">
    </form>
    <p>Sudah memiliki akun? <a href="login.html">Login</a></p>
  </div>
</body>
</html>
