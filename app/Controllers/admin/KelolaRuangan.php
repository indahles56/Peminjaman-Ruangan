<?php

namespace App\Controllers;

use App\Models\RuanganModel;

class KelolaRuangan extends BaseController
{
    protected $RuanganModel;

    public function __construct()
    {
        $this->RuanganModel = new RuanganModel();
    }

    public function tambahRuang()
    {
        // Validasi data yang dikirim dari form
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'kapasitas' => 'required|numeric',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            // Jika validasi gagal, tampilkan pesan error
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $kapasitas = $this->request->getPost('kapasitas');

        // Panggil model untuk menambah ruangan
        $result = $this->RuanganModel->tambahRuangan($nama, $kapasitas);

        if ($result) {
            return redirect()->to(site_url('kelolaruang'))->with('success', 'Ruangan berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan ruangan.');
        }
    }

    public function editRuang($id)
    {
        // Validasi data yang dikirim dari form
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'kapasitas' => 'required|numeric',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            // Jika validasi gagal, tampilkan pesan error
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $kapasitas = $this->request->getPost('kapasitas');

        // Panggil model untuk mengedit ruangan
        $result = $this->RuanganModel->editRuangan($id, $nama, $kapasitas);

        if ($result) {
            return redirect()->to(site_url('kelolaruang'))->with('success', 'Ruangan berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui ruangan.');
        }
    }

    public function hapusRuang($id)
    {
        // Panggil model untuk menghapus ruangan
        $result = $this->RuanganModel->hapusRuangan($id);

        if ($result) {
            return redirect()->to(site_url('kelolaruang'))->with('success', 'Ruangan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus ruangan.');
        }
    }
}
