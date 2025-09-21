<?php 

namespace App\Controllers;

use App\Models\CategoriasModel;

class Categorias extends BaseController
{
    public function index()
    {
        $categoriasModel = new CategoriasModel();

        echo view("categorias/index", [
            'categorias' => $categoriasModel->findAll(),
            ]
        );
    }
    public function new()
    {
        echo view('/categorias/new', [
        'categorias' => [
                'categoryName' => ''
            ]
        ]);
    }
    public function show($id)
    {
        $categoriasModel = new CategoriasModel();
        echo view('/categorias/show', [
            'categorias' => $categoriasModel->find($id)
        ]);
    }
    public function create()
    {
        $categoriasModel = new CategoriasModel();

        $categoriasModel->insert([
            'categoryName' => $this->request->getPost('categoryName'),
        ]);
        
        echo ("Guardado con exito");
    }
    public function edit($id)
    {
        $categoriasModel = new CategoriasModel();
        echo view('/categorias/edit', [
            'id' => $id,
            'categorias' => $categoriasModel->find($id)
        ]);
    }
    public function update($id)
    {
    $categoriasModel = new categoriasModel();

    $categoriasModel->update($id, [
        'categoryName' => $this->request->getPost('categoryName')
    ]);
    echo ("Actualizado con exito");
    }
    public function delete($id)
    {
        $categoriasModel = new CategoriasModel();
        $categoriasModel->delete($id);
        echo ("Eliminado con exito");
    }
}