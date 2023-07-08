<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PeminjamanModel;

class BookingUser extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new PeminjamanModel();
    }

    public function index()
    {
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
