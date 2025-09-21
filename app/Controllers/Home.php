<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    function code()
    {
    echo json_encode(array(
        'key1' => 'value1',
        'key2' => 'value2',
    ));
    }

    function update($id, $otro)
    {
        echo "Actualizando el registro con id: $id, otro valor: $otro";    
    }
}
