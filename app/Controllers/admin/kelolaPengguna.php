<?php

namespace App\Controllers;

use App\Models\UserModel;

class KelolaPengguna extends BaseController
{
     public function index()
    {
        // Mendapatkan daftar pengguna dari database
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        // Tampilkan halaman kelola pengguna
        return view('admin/kelola_pengguna', $data);
    }

    public function create()
    {
        // Tampilkan halaman tambah pengguna
        return view('admin/tambah_pengguna');
    }

    public function store()
    {
        // Memperoleh data dari form tambah pengguna
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');

        // Validasi input

        $validationRules = [
            'fullname' => 'required',
            'email' => 'required|valid_email'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, tampilkan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $userModel = new UserModel();

        $data = [
            'fullname' => $fullname,
            'email' => $email
        ];

        $userModel->insert($data);

        return redirect()->to('admin/kelola-pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mendapatkan data pengguna dari database
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        // Tampilkan halaman edit pengguna
        return view('admin/edit_pengguna', $data);
    }

    public function update($id)
    {
        // Memperoleh data dari form edit pengguna
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');

        // Validasi input

        $validationRules = [
            'fullname' => 'required',
            'email' => 'required|valid_email'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, tampilkan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $userModel = new UserModel();

        $data = [
            'fullname' => $fullname,
            'email' => $email
        ];

        $userModel->update($id, $data);

        return redirect()->to('admin/kelola-pengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Hapus pengguna dari database
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('admin/kelola-pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
