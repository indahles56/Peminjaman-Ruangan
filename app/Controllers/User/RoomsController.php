<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\RuanganModel;

class RoomsController extends BaseController
{
    public function index()
    {
        $roomModel = new RuanganModel();
        $rooms = $roomModel->findAll();
        return view('user/daftar_ruangan', ['rooms' => $rooms]);
    }
}
