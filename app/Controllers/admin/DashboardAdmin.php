<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        // Tampilkan halaman dashboard admin
        return view('admin/dashboard');
    }

    public function account()
    {
        // Tampilkan halaman akun pengguna
        return view('admin/account');
    }

    public function rooms()
    {
        // Tampilkan halaman data ruangan
        return view('admin/rooms');
    }

    public function bookings()
    {
        // Tampilkan halaman data peminjaman
        return view('admin/bookings');
    }

    public function profile()
    {
        // Tampilkan halaman profil admin
        return view('admin/profile');
    }
}
