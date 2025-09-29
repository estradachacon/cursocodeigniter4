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
            'categoria_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categoria_id', 'categorias', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('peliculas');
    }

    public function down()
    {
        $this->forge->dropTable('peliculas');
    }
}
