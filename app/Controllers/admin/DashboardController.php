<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\RuanganModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $users = new UserModel();
        $bookings = new PeminjamanModel();
        $rooms = new RuanganModel();
        // Get the total number of users
        $totalUsers = $users->countAllResults();

        // Get the total number of bookings
        $totalBookings = $bookings->countAllResults();

        // Get the total number of rooms
        $totalRooms = $rooms->countAllResults();

        // Pass the data to the view
        $data = [
            'totalUsers' => $totalUsers,
            'totalBookings' => $totalBookings,
            'totalRooms' => $totalRooms,
        ];

        return view('admin/layouts/main', $data);
    }
}
