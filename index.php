<!DOCTYPE html>
<html>
<head>
    <title>Booking Ruangan</title>
</head>
<body>
    <h1>Booking Ruangan</h1>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
    <?php echo form_open('bookinguser/booking'); ?>
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required><br><br>
        
        <label for="ruangan_id">Pilih Ruangan</label>
        <select name="ruangan_id" required>
            <?php foreach ($ruanganList as $ruangan) : ?>
                <option value="<?php echo $ruangan['id']; ?>"><?php echo $ruangan['nama']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" required><br><br>
        
        <label for="jam_mulai">Jam Mulai</label>
        <input type="time" name="jam_mulai" required><br><br>
        
        <label for="jam_selesai">Jam Selesai</label>
        <input type="time" name="jam_selesai" required><br><br>
        
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" required></textarea><br><br>
        
        <button type="submit">Booking</button>
    <?php echo form_close(); ?>
</body>
</html>
