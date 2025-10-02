<?php

namespace App\Database\Seeds;

use App\Models\PeliculaModel;
use App\Models\CategoriasModel;
use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $peliculaModel = new PeliculaModel();
        $categoriaModel = new CategoriasModel();

        $categorias = $categoriaModel->limit(7)->findAll();

        $peliculaModel->where('id >=', 1)->delete();
        foreach ($categorias as $c) {

            for ($i = 0; $i < 20; $i++) {
                $peliculaModel->insert(
                    [
                        'titulo' => "Pelicula $i",
                        'categoria_id' => $c->id,
                        'description' => "Descripcion para id $i"
                    ]
                );
            }
        }
    }
}
