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

        echo view(
            "peliculas/index",
            [
                'peliculas' => $peliculaModel->findAll(),
                'title' => 'Listado de peliculas'
            ]
        );
    }
    public function new()
    {
        echo view('peliculas/new', [
            'pelicula' => new PeliculaModel(),
            'title' => 'Crear pelicula'
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
        ]);

        return redirect()->to('/dashboard/peliculas')
            ->with('mensaje', 'Pelicula creada con éxito')
            ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast;
    }}

    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('peliculas/edit', [
            'title' => 'Editar pelicula',
            'id' => $id,
            'pelicula' => $peliculaModel->find($id)
        ]);
    }

    public function update($id)
    {
        $peliculaModel = new PeliculaModel();
        if ($this->validate('peliculas')) {
            $peliculaModel->update($id, [
                'titles' => $this->request->getPost('titles'),
                'description' => $this->request->getPost('description'),
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
}
