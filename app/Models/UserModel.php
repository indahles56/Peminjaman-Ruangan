<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'role'];

    // Implementasikan fungsi CRUD lainnya untuk Pengguna
}
