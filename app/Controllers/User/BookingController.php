<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;

class BookingController extends BaseController
{
    public function index()
    {
        $bookingModel = new PeminjamanModel();
        $user = session()->get('user_id');
        $bookings = $bookingModel->where('user', $user)->orderBy('waktu_pengajuan', 'ASC')->findAll();
        return view('user/daftar_peminjaman', ['bookings' => $bookings]);

    }
    public function book()
    {
        $request = $this->request;
        $name = $request->getPost('user_id');
        $roomId = $request->getPost('room_id');
        $timestamp = date('Y-m-d H:i:s', time());
        $date = $request->getPost('date');
        $startTime = $request->getPost('start_time');
        $endTime = $request->getPost('end_time');
        $note = $request->getPost('note');

        // Validation
        $validation = $this->validate([
            'room_id' => 'required',
            'user_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'note' => 'required',
        ]);

        if (!$validation) {
            return $this->response->setJSON(['is_valid' => false, 'message' => $name]);
        }

        $bookModel = new PeminjamanModel();
        $data =
            [
                'kode_ruang' => $roomId,
                'user' => $name,
                'waktu_pengajuan' => $timestamp,
                'tanggal' => $date,
                'waktu_mulai' => $startTime,
                'waktu_selesai' => $endTime,
                'keterangan' => $note,
                'status',
            ];

        $bookModel->insert($data);
        return redirect()->to(base_url('user/booking'));
    }

    public function cancel()
    {
        $request = $this->request;
        $bookId = $request->getPost('id');
        $bookModel = new PeminjamanModel();
        $bookModel->update($bookId, ['status' => 'cancel']);
        return $this->response->setJSON(['success' => true, 'message' => 'Peminjaman telah dibatalkan']);
    }
}
