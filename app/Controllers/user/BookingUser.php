<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\RuanganModel;

class BookingUser extends BaseController
{
    protected $bookingModel;
    protected $ruanganModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $data['ruanganList'] = $this->ruanganModel->getAllRuangan();

        return view('bookinguser/index', $data);
    }

    public function booking()
    {
        // Validasi data yang dikirim dari form
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => 'required',
            'ruangan_id' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            // Jika validasi gagal, tampilkan pesan error
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $namaLengkap = $this->request->getPost('nama_lengkap');
        $ruanganId = $this->request->getPost('ruangan_id');
        $tanggal = $this->request->getPost('tanggal');
        $jamMulai = $this->request->getPost('jam_mulai');
        $jamSelesai = $this->request->getPost('jam_selesai');
        $keterangan = $this->request->getPost('keterangan');

        // Panggil model untuk menambah peminjaman
        $result = $this->bookingModel->tambahBooking($namaLengkap, $ruanganId, $tanggal, $jamMulai, $jamSelesai, $keterangan, 'Pending');

        if ($result) {
            return redirect()->to(site_url('bookinguser'))->with('success', 'Booking berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan booking.');
        }
        // Get the logged in user's ID (assuming you have user authentication implemented)
        $userId = 1; // Replace with your actual logic to get the user ID

        // Get the bookings for the logged in user
        $bookings = $this->bookingModel->where('user_id', $userId)->findAll();

        return view('booking-list', ['bookings' => $bookings]);
    }

    public function create()
    {
        // Handle the booking creation form submission
        // Retrieve the submitted form data
        $userId = 1; // Replace with your actual logic to get the user ID
        $roomId = $this->request->getPost('room_id');
        $date = $this->request->getPost('date');
        $startTime = $this->request->getPost('start_time');
        $endTime = $this->request->getPost('end_time');

        // Perform validation on the submitted data

        // If validation fails, redirect back to the form with validation errors

        // If validation succeeds, create the booking in the database

        // Redirect to the booking list or show a success message
    }

    public function edit($id)
    {
        // Get the booking by ID
        $booking = $this->bookingModel->find($id);

        // Perform any necessary checks (e.g., ownership)

        // Show the booking edit form
        return view('booking-edit', ['booking' => $booking]);
    }

    public function update($id)
    {
        // Handle the booking update form submission
        // Get the booking by ID
        $booking = $this->bookingModel->find($id);

        // Perform any necessary checks (e.g., ownership)

        // Retrieve the submitted form data
        $roomId = $this->request->getPost('room_id');
        $date = $this->request->getPost('date');
        $startTime = $this->request->getPost('start_time');
        $endTime = $this->request->getPost('end_time');

        // Perform validation on the submitted data

        // If validation fails, redirect back to the form with validation errors

        // If validation succeeds, update the booking in the database

        // Redirect to the booking list or show a success message
    }

    public function delete($id)
    {
        // Get the booking by ID
        $booking = $this->bookingModel->find($id);

        // Perform any necessary checks (e.g., ownership)

        // Delete the booking from the database

        // Redirect to the booking list or show a success message
    }
}
