<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;

class ManageBookingsController extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new PeminjamanModel();
    }
    public function index()
    {
        $bookings = $this->bookingModel->findAll();
        return view('admin/kelola_peminjaman', ['bookings' => $bookings]);
    }
}
