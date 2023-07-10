<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RuanganModel;

class ManageRoomsController extends BaseController
{
    public function index()
    {
        $roomModel = new RuanganModel();
        $rooms = $roomModel->findAll();
        return view('admin/kelola_ruang', ['rooms' => $rooms]);
    }

    public function store()
    {

        // Get the request object
        $request = $this->request;

        // Validate the form data
        $validation = $this->validate([
            'kode_ruang' => 'required|is_unique[ruangan.kode_ruang]',
            'nama_ruang' => 'required',
            'spesifikasi' => 'required',
        ]);

        if (!$validation) {
            return $this->response->setJSON(['is_valid' => false, 'message' => 'Data ruangan not found']);
        }

        $roomModel = new RuanganModel();

        // get form data
        $roomCode = $request->getPost('kode_ruang');
        $roomName = $request->getPost('nama_ruang');
        $spec = $request->getPost('spesifikasi');

        $data = [
            'kode_ruang' => $roomCode,
            'nama_ruang' => $roomName,
            'spesifikasi' => $spec,
        ];

        $roomModel->insert($data);
        return $this->response->setJSON(['success' => true, 'message' => 'Room Added']);

    }

    public function update($id)
    {
        $roomModel = new RuanganModel();

        $request = $this->request;

        // get form data
        $roomCode = $request->getPost('kode_ruang');
        $roomName = $request->getPost('nama_ruang');
        $spec = $request->getPost('spesifikasi');

        $validation = $this->validate([
            'kode_ruang' => 'required',
            'nama_ruang' => 'required',
            'spesifikasi' => 'required',
        ]);

        if (!$validation) {
            return $this->response->setJSON(['is_valid' => false, 'message' => 'Request tidak valid', 'data' => 'Validation Error']);
        }
        $room = $roomModel->find($id);
        if (!$room) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data ruang not found']);
        }

        $data = [
            'kode_ruang' => $roomCode,
            'nama_ruang' => $roomName,
            'spesifikasi' => $spec,
        ];

        $roomModel->update($id, $data);
        return $this->response->setJSON(['success' => true, 'message' => 'Room Updated', 'data' => $data]);
    }
}
