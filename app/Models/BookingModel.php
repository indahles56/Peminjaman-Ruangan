<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pengguna_id', 'ruangan_id', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'keterangan', 'status_pengajuan'];

    public function getAllBookings()
    {
        return $this->findAll();
    }

    public function tambahBooking($penggunaId, $ruanganId, $tanggal, $waktuMulai, $waktuSelesai, $keterangan, $statusPengajuan)
    {
        $data = [
            'pengguna_id' => $penggunaId,
            'ruangan_id' => $ruanganId,
            'tanggal' => $tanggal,
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
            'keterangan' => $keterangan,
            'status_pengajuan' => $statusPengajuan,
        ];

        return $this->insert($data);
    }
    public function getUpcomingBookingsByUser($userId)
    {
        $today = date('Y-m-d');
        $this->where('tanggal >=', $today)
            ->where('pengguna_id', $userId)
            ->orderBy('tanggal', 'asc')
            ->orderBy('waktu_mulai', 'asc');

        return $this->findAll();
    }

    public function editBooking($id, $penggunaId, $ruanganId, $tanggal, $waktuMulai, $waktuSelesai, $keterangan, $statusPengajuan)
    {
        $data = [
            'pengguna_id' => $penggunaId,
            'ruangan_id' => $ruanganId,
            'tanggal' => $tanggal,
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
            'keterangan' => $keterangan,
            'status_pengajuan' => $statusPengajuan,
        ];

        return $this->update($id, $data);
    }

    public function hapusBooking($id)
    {
        return $this->delete($id);
    }
}
