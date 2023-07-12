<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('peminjaman');

        $this->forge->addField([
            'kode_pinjam' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_ruang' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'waktu_pengajuan' => [
                'type' => 'DATETIME',
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
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'Pending',
            ],
            'admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('kode_pinjam');
        $this->forge->createTable('peminjaman');

        $this->db->query("ALTER TABLE `peminjaman` ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user`) REFERENCES `pengguna`(`id`) ON DELETE CASCADE ON UPDATE CASCADE");
        $this->db->query("ALTER TABLE `peminjaman` ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin`) REFERENCES `admin`(`id`) ON DELETE CASCADE ON UPDATE CASCADE");
        $this->db->query("ALTER TABLE `peminjaman` ADD CONSTRAINT `fk_pinjam_id` FOREIGN KEY (`kode_ruang`) REFERENCES `ruangan`(`id`) ON DELETE CASCADE ON UPDATE CASCADE");
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman');
    }
}
