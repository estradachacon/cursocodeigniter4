<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('Peliculas')->where('id >=', 1)->delete();

        for ($i = 1; $i <= 10; $i++) {
            $this->db->table('Peliculas')->insert([
                'titles' => 'Pelicula # ' . $i,
                'description' => 'Descripcion de la pelicula # ' . $i
            ]);
        }
    }
}
