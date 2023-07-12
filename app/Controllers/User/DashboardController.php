<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\RuanganModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $request = service('request')->getMethod();
        $roomModel = new RuanganModel();

        if (!($request === 'post')) {
            $roomData = $roomModel->findAll();
            return view('user/dashboard', ['rooms' => $roomData]);
        }

        return view('user/dashboard', );
    }
}
