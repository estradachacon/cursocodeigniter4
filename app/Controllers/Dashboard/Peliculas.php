<?php 

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PeliculaModel;
use Config\App;

class Peliculas extends BaseController
{
    public function index()
    {
        $peliculaModel = new PeliculaModel();

        echo view("peliculas/index", [
            'peliculas' => $peliculaModel->findAll(),
            ]
        );
    }
    public function new()
    {
        echo view('peliculas/new', [
            'pelicula' => [
                'titles' => '',
                'description' => ''
            ]
        ]);
    }

    public function show($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('peliculas/show', [
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
        
        return redirect()->to('/dashboard/peliculas')
                         ->with('mensaje', 'Pelicula creada con éxito')
                         ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast;
    }

    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('peliculas/edit', [
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
    
    return redirect()->to('/dashboard/peliculas')
                         ->with('mensaje', 'Pelicula actualizada con éxito')
                         ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast;;
    }
    
    public function delete($id)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);
        return redirect()->to('/dashboard/peliculas')
                         ->with('mensaje', 'Pelicula eliminada con éxito')
                         ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast;;
    }
}