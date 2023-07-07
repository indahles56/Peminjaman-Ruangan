<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('feedback');
        $this->db->query('ALTER TABLE `feedback` ADD CONSTRAINT `fk_user_feddback_id` FOREIGN KEY (`user`) REFERENCES `pengguna`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}
