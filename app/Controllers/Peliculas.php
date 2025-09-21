<?php 

namespace App\Controllers;

use App\Models\PeliculaModel;

class Peliculas extends BaseController
{
    public function index()
    {
        $peliculaModel = new PeliculaModel();

        echo view("/peliculas/index", [
            'peliculas' => $peliculaModel->findAll(),
            ]
        );
    }
    public function new()
    {
        echo view('/peliculas/new', [
            'pelicula' => [
                'titles' => '',
                'description' => ''
            ]
        ]);
    }
    public function show($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('/pelicula/show', [
            'pelicula' => $peliculaModel->find($id)
        ]);
    }
    public function create()
    {
        $peliculaModel = new PeliculaModel();

        $peliculaModel->insert([
            'titles' => $this->request->getPost('titles'),
            'description' => $this->request->getPost('description'),
        ]);
        
        echo ("Guardado con exito");
    }
    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('/peliculas/edit', [
            'id' => $id,
            'pelicula' => $peliculaModel->find($id)
        ]);
    }
    public function update($id)
    {
    $peliculaModel = new PeliculaModel();

    $peliculaModel->update($id, [
        'titles' => $this->request->getPost('titles'),
        'description' => $this->request->getPost('description'),
    ]);
    echo ("Actualizado con exito");
    }
    public function delete($id)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);
        echo ("Eliminado con exito");
    }
}