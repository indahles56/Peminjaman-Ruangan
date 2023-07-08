<?php

namespace App\Controllers;

use App\Models\RuanganModel;
use App\Models\RuangModel;

class KelolaRuang extends BaseController
{
    protected $ruangModel;

    public function __construct()
    {
        $this->ruangModel = new RuanganModel();
    }

    public function delete($id)
    {
        // Check if the ruang exists
        $ruang = $this->ruangModel->find($id);
        if (!$ruang) {
            return redirect()->back()->with('error', 'Ruang not found.');
        }

        // Delete the ruang
        $this->ruangModel->delete($id);

        return redirect()->back()->with('success', 'Ruang deleted successfully.');
    }

    public function update($id)
    {
        // Check if the ruang exists
        $ruang = $this->ruangModel->find($id);
        if (!$ruang) {
            return redirect()->back()->with('error', 'Ruang not found.');
        }

        // Retrieve the submitted form data
        $data = [
            'nama_ruang' => $this->request->getPost('nama_ruang')
        ];

        // Validate the input data
        $validation = $this->validate([
            'nama_ruang' => 'required'
        ]);

        // If validation fails, redirect back to the form with validation errors
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update the ruang
        $this->ruangModel->update($id, $data);

        return redirect()->back()->with('success', 'Ruang updated successfully.');
    }

    public function get($id)
    {
        // Check if the ruang exists
        $ruang = $this->ruangModel->find($id);
        if (!$ruang) {
            return redirect()->back()->with('error', 'Ruang not found.');
        }

        // Retrieve the ruang details
        $ruangDetails = $this->ruangModel->find($id);

        return view('ruang-details', ['ruang' => $ruangDetails]);
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
    }
}
