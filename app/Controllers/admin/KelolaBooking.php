<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PeminjamanModel;

class KelolaBooking extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new PeminjamanModel();
    }

    public function delete($id)
    {
        // Check if the booking exists
        $booking = $this->bookingModel->find($id);
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Delete the booking
        $this->bookingModel->delete($id);

        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }

    public function update($id)
    {
        // Check if the booking exists
        $booking = $this->bookingModel->find($id);
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Retrieve the submitted form data
        $data = [
            'nama_ruang' => $this->request->getPost('nama_ruang'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
        ];

        // Validate the input data
        $validation = $this->validate([
            'nama_ruang' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'waktu_selesai',
        ]);

        // If validation fails, redirect back to the form with validation errors
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update the booking
        $this->bookingModel->update($id, $data);

        return redirect()->back()->with('success', 'Booking updated successfully.');
    }

    public function get($id)
    {
        // Check if the booking exists
        $booking = $this->bookingModel->find($id);
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Retrieve the booking details
        $bookingDetails = $this->bookingModel->find($id);

        return view('booking-details', ['booking' => $bookingDetails]);
    }
}
