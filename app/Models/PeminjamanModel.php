<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'kode_pinjam';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_ruang', 'user', 'waktu_pengajuan', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'keterangan', 'status', 'admin'];
}
