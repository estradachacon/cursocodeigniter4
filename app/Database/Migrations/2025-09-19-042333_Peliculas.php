<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peliculas extends Migration
{
    public function up()
    {
        $this->forge->addfield([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'titles' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('peliculas');
    }

    public function down()
    {
        $this->forge->dropTable('peliculas');
    }
}
