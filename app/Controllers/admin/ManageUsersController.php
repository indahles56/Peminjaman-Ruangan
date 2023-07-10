<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ManageUsersController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = $userModel->findAll();
        return view('admin/kelola_user', [
            'success' => true,
            'message' => 'User Deleted',
            'users' => $data
        ]);
    }
    public function delete($id)
    {
        $userModel = new UserModel();

        // Check jika user ada
        $user = $userModel->find($id);
        if (!$user) {
            return $this->response->setJSON(['success' => false, 'message' => 'User not found']);
        }

        $userModel->delete($id);
        return $this->response->setJSON(['success' => true, 'message' => 'User Deleted']);
    }
}
