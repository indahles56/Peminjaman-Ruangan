<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_pinjam' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_ruang' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'waktu_pengajuan' => [
                'type' => 'TIMESTAMP',
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'waktu_mulai' => [
                'type' => 'TIME',
            ],
            'waktu_selesai' => [
                'type' => 'TIME',
            ],
        ]);
        $this->forge->addPrimaryKey('kode_pinjam');
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman');
    }
}
