<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Tampilkan halaman home
        return view('home');
    }

    public function tentang()
    {
        // Tampilkan halaman tentang
        return view('tentang');
    }

    public function daftarRuangan()
    {
        // Tampilkan halaman daftar ruangan
        return view('daftar_ruangan');
    }

    public function daftarBooking()
    {
        // Tampilkan halaman daftar booking
        return view('daftar_booking');
    }

    public function profil()
    {
        // Tampilkan halaman profil
        return view('profil');
    }
}
