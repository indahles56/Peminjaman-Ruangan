<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\UserModel;

class ManageBookingsController extends BaseController
{
    protected $bookingModel;
    protected $userModel;

    public function __construct()
    {
        $this->bookingModel = new PeminjamanModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $bookings = $this->bookingModel->findAll();
        foreach ($bookings as &$booking) {
            // Retrieve the user details based on the 'user' field
            $user = $this->userModel->find($booking['user']);

            // Set the username in the booking array
            $booking['username'] = $user['name'];
        }
        return view('admin/kelola_peminjaman', ['bookings' => $bookings]);
    }

    public function update()
    {
        $request = $this->request;
        $bookId = $request->getPost('id');
        $status = $request->getPost('status');

        if ($status === 'approve') {
            $newStatus = 'Setujui';
        } elseif ($status === 'deny') {
            $newStatus = 'Tolak';
        } else {
            // Invalid status received, handle the error accordingly
            // ...
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi Error. Silahkan Tunggu Beberapa Saat Lagi.'
            ]);
        }

        $this->bookingModel->update($bookId, ['status' => $newStatus]);
        return $this->index();
    }

}
