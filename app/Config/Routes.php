<?php

namespace Config;

$routes = Services::routes();

if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('login', '\App\Controllers\Web\Usuario::login', ['as' => 'usuario.login']);
$routes->post('login_post', '\App\Controllers\Web\Usuario::login_post', ['as' => 'usuario.login_post']);

$routes->get('register', '\App\Controllers\Web\Usuario::register', ['as' => 'usuario.register']);
$routes->get('logout', '\App\Controllers\Web\Usuario::logout', ['as' => 'usuario.logout']);
$routes->post('register', '\App\Controllers\Web\Usuario::register_post', ['as' => 'usuario.register_post']);

$routes->group('dashboard', function ($routes) {
    $routes->presenter("peliculas", ['controller' => 'Dashboard\Peliculas', 'only' => ['index', 'show', 'new', 'create', 'edit', 'update', 'delete']]); //esto crea las rutas para un CRUD cuando se usa la aplicacion con un navegador
    $routes->presenter("categorias", ['controller' => 'Dashboard\Categorias', 'only' => ['index', 'new', 'create', 'edit', 'update', 'delete']]);
});

$routes->get("/", "Home::index");



// $routes->presenter("home"); esto crea las rutas para un CRUD cuando se usa la aplicacion con un navegador
// $routes->resource("home"); esto crea las rutas para un CRUD cuando se usa la aplicacion con fetch o axios, incluso API REST
/*
    $routes->get('/index', 'Home::index'); //listado
    $routes->get("show/(:num)", "Home::show/$1"); //detalle
    $routes->get('/new', 'Home::new');  //mostrar el formulario de registro
    $routes->post('create', 'Home::create'); // procesar y registrar

    $routes->get('/edit/(:num)', 'Home::edit/$1');  //mostrar el formulario de edición
    $routes->put('update/(:num)', 'Home::update/$1'); // procesar y editar
    $routes->delete('delete/(:num)', 'Home::delete/$1'); // elimina
    */

/* Tipos de peticiones de HTTP
    * $routes->get('ruta', 'Controlador::metodo'); // GET SON PARA OBTENER DATOS DESDE LA URL
    * $routes->post('ruta', 'Controlador::metodo'); // POST SON PARA ENVIAR DATOS Y CREAR RECURSOS  
    * $routes->put('ruta', 'Controlador::metodo'); // PUT ES PARA ACTUALIZAR RECURSOS
    * $routes->delete('ruta', 'Controlador::metodo'); // DELETE
    * $routes->patch('ruta', 'Controlador::metodo'); // PATCH
    * $routes->options('ruta', 'Controlador::metodo'); // OPTIONS
    * $routes->match(['get', 'post'], 'ruta', 'Controlador::metodo'); // GET y POST
    * $routes->add('ruta', 'Controlador::metodo'); // Cualquier tipo de petición HTTP
    */