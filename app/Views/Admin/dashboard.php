
<?php
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


<!-- Tabel Data User [Awal] -->
<table>
	<tr>
		<th>No.</th>
		<th>Nama Lengkap</th>
		<th>Username</th>
		<th>Aksi</th>
	</tr>
 	
	<?php $no = 1; foreach ($tb as $user): ?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td><?php echo $user['fullname']; ?></td>
		<td><?php echo $user['username']; ?></td>
		<td><?php echo $user['level']; ?></td>
		<td align="center">
			<div class="button-edit">
	            <a href="" data-toggle="modal" data-target="#suntinguser<?php echo $user['username']; ?>" data-backdrop="static">Sunting</a>
	        </div>
	        <div class="button-delete">
	        	<a href="" data-toggle="modal" data-target="#hapususer<?php echo $user['username']; ?>" data-backdrop="static">Hapus</a>
	        </div>
		</td>
	</tr>
  	<?php $no++; endforeach; ?>
</table>
<!-- Tabel Data User [Akhir] -->

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
	<!-- AdminLTE v3 JS -->
	<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
    <!-- Tambahkan link CSS atau framework CSS lainnya -->
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Menu Navigasi -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Selamat datang di Pinjam Ruang!</h1>
                            <h2>Pinjam Ruangan Mudah dan Cepat</h2>
                        </div>
                    </div>
                </div>
            </div>
			<div class="modal-footer">
				<span>Pastikan data telah terisi dengan benar.</span>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<!-- Modal Buat User [Akhir] -->


<!-- Modal Perbarui Data User [Awal] -->
<?php foreach ($tb as $user): ?>
<div id="suntinguser<?php echo $user['username']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Sunting Akun
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/perbarui-user'); ?>
				<ul>
					<li>
						<input type="hidden" name="username" value="<?php echo $user['username']; ?>">
					</li>
					<li>
						<div><i class="lnr lnr-text-format"></i></div><input type="text" name="fullname" placeholder="Nama lengkap" maxlength="25" value="<?php echo $user['fullname']; ?>" required />
					</li>
					<li>
						<div><i class="lnr lnr-user"></i></div><input type="text" placeholder="Nama pengguna" value="<?php echo $user['username']; ?> (tidak dapat diubah)" disabled />
					</li>
					<br /><hr />
					<li>
						<input type="submit" name="tombol_simpan" value="Simpan" />
					</li>
				</ul>
				<?php echo form_close(); ?>
			</div>

			<div class="modal-footer" >
				<span>Pastikan data telah terisi dengan benar.</span>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<?php endforeach; ?>
<!-- Modal Perbarui Data User [Akhir] -->


<!-- Modal Hapus Data User [Awal] -->
<?php foreach ($tb as $user): ?>
<div id="hapususer<?php echo $user['username']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Hapus Akun
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/hapus-user'); ?>
				<ul>
					<li>
						<input type="hidden" name="username" value="<?php echo $user['username']; ?>">
					</li>
					<li>
						<p>Apakah Anda yakin ingin menghapus akun <span><?php echo $user['fullname']; ?></span> dari sistem?</p>
					</li>
					<br /><hr />
					<li>
						<input type="submit" name="tombol_hapus" value="Hapus" />
					</li>
				</ul>
				<?php echo form_close(); ?>
			</div>

			<div class="modal-footer">
				<span>Pastikan kembali apakah data benar-benar ingin dihapus.</span>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<?php endforeach; ?>
<!-- Modal Hapus Data User [Akhir] -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h1>Booking Disini</h1>
                            <form action="<?= base_url('user/processBooking') ?>" method="POST">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pilih_ruangan">Pilih Ruangan:</label>
                                    <input type="text" id="pilih_ruangan" name="pilih_ruangan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai:</label>
                                    <input type="date" id="jam_mulai" name="jam_mulai" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai:</label>
                                    <input type="date" id="jam_selesai" name="jam_selesai" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <input type="text" id="keterangan" name="keterangan" class="form-control" required>
                                </div>
                                <!-- Tambahkan elemen form untuk booking ruangan di sini -->
                                <button type="submit" class="btn btn-primary">BOOKING</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
</body>
</html>
