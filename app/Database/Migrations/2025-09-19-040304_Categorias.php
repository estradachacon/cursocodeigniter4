<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
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
            'categoryName' => [
                'type' => 'TEXT',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categorias');
    }

    public function down()
    {
        //
    }
}
