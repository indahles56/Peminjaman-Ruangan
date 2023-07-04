<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table            = 'ruangan';
    protected $primaryKey       = 'kode_ruang';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_ruang'];
}