<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Api\Categoria;
use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\ImagenModel;
use App\Models\PeliculaImagenModel;
use App\Models\PeliculaModel;
use Config\App;

class Peliculas extends BaseController
{
    public function index()
    {
        $peliculaModel = new PeliculaModel();

       /*  $this->asignar_imagen(); */

/*         $data = [
            'peliculas' => $peliculaModel->select('peliculas.*, categoryName as catetitulo')->join('categorias', 'categorias.id = peliculas.categoria_id')->find()
        ]; 

        echo view(
            "peliculas/index",
            [
                'peliculas' => $data,
                'title' => 'Listado de peliculas'
            ]
        ); */

        $data = [
            'title' => 'Listado de peliculas',
            'peliculas' => $peliculaModel->join('categorias', 'categorias.id = peliculas.categoria_id')->find()
            
        ];
        echo view(
            'peliculas/index', $data
        );
    }
    public function new()
    {
        $categoriaModel = new CategoriasModel();

        echo view('peliculas/new', [
            'pelicula' => new PeliculaModel(),
            'title' => 'Crear pelicula',
            'categorias' => $categoriaModel->find()
        ]);
    }

    public function show($id)
    {
        $peliculaModel = new PeliculaModel();

        echo view('peliculas/show', [
            'title' => 'Datos de la pelicula',
            'peliculas' => $peliculaModel->find($id)
        ]
        );
    }
/*     public function show($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('peliculas/show', [
            'title' => 'Datos de la pelicula',
            'pelicula' => $peliculaModel->find($id)
        ]);
    } */

    public function create()
    {
        $peliculaModel = new PeliculaModel();

        if (!$this->validate('peliculas')) {
            // Pasa el objeto del validador completo a la sesión
            session()->setFlashdata('validation', $this->validator);
            // Redirige de vuelta al formulario con los datos ingresados previamente
            return redirect()->back()->withInput();
        }else{
        $peliculaModel->insert([
            'titles' => $this->request->getPost('titles'),
            'description' => $this->request->getPost('description'),
            'categoria_id' => $this->request->getPost('categoria_id')
        ]);

        return redirect()->to('/dashboard/peliculas')
            ->with('mensaje', 'Pelicula creada con éxito')
            ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast;
    }}

    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();
        $categoriaModel = new CategoriasModel();
        
        echo view('peliculas/edit', [
            'id' => $id,
            'pelicula' => $peliculaModel->find($id),
            'categorias' => $categoriaModel->find()
        ]);
    }

    public function update($id)
    {
        $peliculaModel = new PeliculaModel();
        if ($this->validate('peliculas')) {
            $peliculaModel->update($id, [
                'titles' => $this->request->getPost('titles'),
                'description' => $this->request->getPost('description'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ]);
            return redirect()->to('/dashboard/peliculas')
                ->with('mensaje', 'Pelicula actualizada con éxito')
                ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast
        } else {
            // Pasa el objeto del validador completo a la sesión
            session()->setFlashdata('validation', $this->validator);
        }

        // Asegúrate de redirigir al formulario si la validación falla
        return redirect()->back()->withInput();
    }

    public function delete($id)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);
        return redirect()->to('/dashboard/peliculas')
            ->with('mensaje', 'Pelicula eliminada con éxito')
            ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast;;
    }

    private function generar_imagen()
    {
        $imagenModel = new ImagenModel();
        $imagenModel->insert([
            'imagen' => date('Y-m-d H:m:s'),
            'extension' => 'Pendiente',
            'data' => 'Pendiente',
        ]);
    }
    private function asignar_imagen()
    {
        $peliculaImagenModel = new PeliculaImagenModel();
        $peliculaImagenModel->insert([
            'imagen_id' => 2,
            'pelicula_id' => 7,
        ]);
    }
}
