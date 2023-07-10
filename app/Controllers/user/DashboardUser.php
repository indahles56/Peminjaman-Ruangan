<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class DashboardUser extends BaseController
{
    public function home()
    {
        // Tampilkan halaman home pengguna
        return view('user/dashboard1');
    }

    public function tentang()
    {
        // Tampilkan halaman tentang
        return view('dashboarduser/tentang');
    }

    public function daftarRuangan()
    {
        // Tampilkan halaman daftar ruangan
        return view('dashboarduser/daftar_ruangan');
    }

    public function daftarBooking()
    {
        // Tampilkan halaman daftar booking pengguna
        return view('dashboarduser/daftar_booking');
    }

    public function profil()
    {
        // Tampilkan halaman profil pengguna
        return view('dashboarduser/profil');
    }
}
