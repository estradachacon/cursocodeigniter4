<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{
    public function create_user()
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->insert([
            'usuario'   => 'admin',
            'email'     => 'admin@gmail.com',
            'contrasena'=> $usuarioModel->contrasenaHash('123456')]);
    }

    public function probar_contrasena()
    {
        $usuarioModel = new UsuarioModel();
        echo $usuarioModel->contrasenaVerificar('123456', '$2y$10$u2urroTuPwwmUhvuMsrkp.SIxa9eHJgyD/4jNGwxcb1GGveoK6.0u');
    }
    
    public function login()
    {
        echo view('web/usuario/login', [
            'title' => 'Iniciar sesión'
        ]);
    }

    public function login_post()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasena');
        $usuario = $usuarioModel->select('id, usuario, email, contrasena, tipo')
                                ->where('email', $email)
                                ->orWhere('usuario', $email)
                                ->first();
        if(!$usuario){
            return redirect()->back()->with('mensaje', 'Usuario o contraseña invalida')
                                     ->with('tipo', 'danger');
        }
        if(!$usuarioModel->contrasenaVerificar($contrasena, $usuario->contrasena)){
            $session = session();
            unset($usuario->contrasena);
            session()->set('usuario', $usuario);

            return redirect()->to('/dashboard/peliculas')->with('mensaje', 'Inicio de sesión exitoso, Bienvenid@ ' . $usuario->usuario)
                                                        ->with('tipo', 'success');
        }
        return redirect()->back()->with('mensaje', 'Usuario o contraseña invalida')
                                 ->with('tipo', 'danger');
    }

    public function register()
    {
        echo view('web/usuario/register', [
            'title' => 'Registrar nuevo usuario'
        ]);
    }

    public function register_post()
    {
        $usuarioModel = new UsuarioModel();

        if($this->validate('usuarios'))
        {
            $usuarioModel->insert([
                'usuario'   => $this->request->getPost('usuario'),
                'email'     => $this->request->getPost('email'),
                'contrasena'=> $usuarioModel->contrasenaHash($this->request->getPost('contrasena'))
            ]);
            return redirect()->to(route_to('usuario.login'))->with('mensaje', 'Usuario registrado exitosamente, ya puedes iniciar sesión')
                                     ->with('tipo', 'success');
        }
            return redirect()->back()->with('mensaje', 'Error al crear usuario')
                                     ->with('tipo', 'danger');
    }
}