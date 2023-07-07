<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\RuanganModel;

class BookingUser extends BaseController
{
    protected $BookingModel;
    protected $RuanganModel;

    public function __construct()
    {
        $this->BookingModel = new BookingModel();
        $this->RuanganModel = new RuanganModel();
    }

    public function index()
    {
        $data['ruanganList'] = $this->RuanganModel->getAllRuangan();

        return view('bookinguser/index', $data);
    }

    public function booking()
    {
        // Validasi data yang dikirim dari form
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => 'required',
            'ruangan_id' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            // Jika validasi gagal, tampilkan pesan error
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $namaLengkap = $this->request->getPost('nama_lengkap');
        $ruanganId = $this->request->getPost('ruangan_id');
        $tanggal = $this->request->getPost('tanggal');
        $jamMulai = $this->request->getPost('jam_mulai');
        $jamSelesai = $this->request->getPost('jam_selesai');
        $keterangan = $this->request->getPost('keterangan');

        // Panggil model untuk menambah peminjaman
        $result = $this->BookingModel->tambahBooking($namaLengkap, $ruanganId, $tanggal, $jamMulai, $jamSelesai, $keterangan);

        if ($result) {
            return redirect()->to(site_url('bookinguser'))->with('success', 'Booking berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan booking.');
        }
    }
}
