<?php 

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{
    public function index()
    {
        $categoriasModel = new CategoriasModel();

        echo view("categorias/index", [
            'title' => 'Lista de categorias',
            'categorias' => $categoriasModel->findAll(),
            ]
        );
    }
    public function new()
    {
        echo view('/categorias/new', [
        'title' => 'Crear categoria',
        'categorias' => new CategoriasModel(),
        ]);
    }

    public function create()
    {
        $categoriasModel = new CategoriasModel();

        if ($this->validate('categorias')) {
            $categoriasModel->insert([
                'categoryName' => $this->request->getPost('categoryName')
            ]);
            return redirect()->to('/dashboard/categorias')
                ->with('mensaje', 'Categoria creada con éxito')
                ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast
        } else {
            // Pasa el objeto del validador completo a la sesión
            session()->setFlashdata('validation', $this->validator);
            return redirect()->back()->withInput();
        }
    }
    public function edit($id)
    {
        $categoriasModel = new CategoriasModel();
        echo view('/categorias/edit', [
            'title' => 'Editar pelicula',
            'id' => $id,
            'categorias' => $categoriasModel->find($id)
        ]);
    }

    public function update($id)
    {
        $categoriasModel = new CategoriasModel();
        if ($this->validate('categorias')) {
            $categoriasModel->update($id, [
                'categoryName' => $this->request->getPost('categoryName')
            ]);
            return redirect()->to('/dashboard/categorias')
                ->with('mensaje', 'Categoria actualizada con éxito')
                ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast
        } else {
            // Pasa el objeto del validador completo a la sesión
            session()->setFlashdata('validation', $this->validator);
            return redirect()->back()->withInput();
        }   
    }

    public function delete($id)
    {
        $categoriasModel = new CategoriasModel();
        $categoriasModel->delete($id);
        return redirect()
            ->to('/dashboard/categorias')
            ->with('mensaje', 'Categoría eliminada con éxito')
            ->with('tipo', 'success'); //para el sweetalert2, este es el mensaje en toast
    }
}