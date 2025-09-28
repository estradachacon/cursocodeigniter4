<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;

class Pelicula extends ResourceController {
    protected $modelName = 'App\Models\PeliculaModel';
    protected $format = 'json';
    // protected $format = 'xml';

    public function index() {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null) {
        return $this->respond($this->model->find($id));
    }

    public function create()     
    {
        if ($this->validate('peliculas')) {
            $id = $this->model->insert([
                'titles' => $this->request->getPost('titles'),
                'description' => $this->request->getPost('description'),
            ]);
        }else{
            return $this->respond($this->validator->getErrors(), 400);
        }
        return $this->respond($id);
    }

    public function update($id = null)
    {
        if ($this->validate('peliculas')) {
            $this->model->update($id, [
                'titles' => $this->request->getRawInput()['titles'],
                'description' => $this->request->getRawInput()['description']
            ]);
        } else {

            return $this->respond($this->validator->getErrors(), 400);

            // O también se puede hacer así, pero así es menos eficiente:
/*            if ($this->validator->getError('titles')) {
                return $this->respond($this->validator->getError('titles'), 400);
            }

            if ($this->validator->getError('description')) {
                return $this->respond($this->validator->getError('description'), 400);
            } */
        }
        return $this->respond($id);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond(['id' => $id]);
    }
}