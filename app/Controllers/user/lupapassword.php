<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    public function index()
    {
        // Tampilkan halaman dashboard admin
        return view('user/dashboard');
    }

    
    public function forgotPassword()
    {
        // Mengambil input dari form lupa password
        $email = $this->request->getPost('email');

        // Cek apakah email ada dalam database
        $adminModel = new AdminModel();
        $admin = $adminModel->where('email', $email)->first();

        if (!$admin) {
            // Jika email tidak ditemukan, tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Email tidak terdaftar.');
        }

        // Generate token reset password
        $resetToken = md5(uniqid());

        // Simpan token reset password ke database
        $adminModel->update($admin['id'], ['reset_token' => $resetToken]);

        // Kirim email dengan tautan reset password ke email pengguna
        $this->sendResetEmail($email, $resetToken);

        return redirect()->to('login')->with('success', 'Instruksi reset password telah dikirim ke email Anda.');
    }

    private function sendResetEmail($email, $resetToken)
    {
        // Kode untuk mengirim email reset password ke email pengguna
        // Anda dapat menggunakan library atau service email yang sesuai di sini
    }
}
