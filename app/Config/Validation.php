<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    // Reglas para el controlador de categorias
    public $categorias = [
        'categoryName' => 'required|min_Length[3]|max_length[30]',
    ];

    // Reglas para el controlador de peliculas
    public $peliculas = [
        'titles' => [
            'label'  => 'Título',
            'rules'  => 'required|min_length[3]|max_length[30]',
            'errors' => [
                'required'   => 'El campo {field} es obligatorio.',
                'min_length' => 'El campo {field} debe tener al menos {param} caracteres.',
                'max_length' => 'El campo {field} no puede superar los {param} caracteres.',
            ]
        ],
        'description' => [
            'label'  => 'Descripción',
            'rules'  => 'required|min_length[3]|max_length[300]',
            'errors' => [
                'required'   => 'El campo {field} es obligatorio.',
            ]
        ],
        'categoria_id' => [
            'label'  => 'Categoría',
            'rules'  => 'required|is_natural_no_zero',
            'errors' => [
                'required'           => 'Debe seleccionar una {field}.',
                'is_natural_no_zero' => 'Debe seleccionar una {field} válida.',
            ]
        ],
    ];


    public $usuarios = [
        'usuario' => 'required|min_Length[3]|max_length[20]|is_unique[usuarios.usuario,id,{id}]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'contrasena' => 'required|min_length[5]|max_length[20]',
    ];
}
