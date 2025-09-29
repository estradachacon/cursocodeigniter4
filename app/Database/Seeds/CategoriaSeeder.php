<?php

namespace App\Database\Seeds;

use App\Models\CategoriasModel;
use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categorias')->where('id >=', 1)->delete();

        for ($i = 1; $i <= 10; $i++) {
            $this->db->table('categorias')->insert([
                'categoryName' => 'Nueva categoria ' . $i
            ]);
        }
    }
}
