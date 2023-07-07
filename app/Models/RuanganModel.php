<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = 'ruangan';
    protected$primaryKey = 'id';
    protected $allowedFields = ['nama', 'kapasitas'];
    public function getAllRuangan()
    {
        return $this->findAll();
    }
    public function tambahRuangan($nama, $kapasitas)
    {
        $data = [
            'nama' => $nama,
            'kapasitas' => $kapasitas,
        ];

        return $this->insert($data);
    }

    public function editRuangan($id, $nama, $kapasitas)
    {
        $data = [
            'nama' => $nama,
            'kapasitas' => $kapasitas,
        ];

        return $this->update($id, $data);
    }

    public function hapusRuangan($id)
    {
        return $this->delete($id);
    }
}
