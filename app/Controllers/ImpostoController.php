<?php

namespace App\Controllers;

use App\Models\Groups;
use App\Models\Imposto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;


class ImpostoController 
{
    private $imposto;

    public function __construct()
    {
        $this->imposto = new Imposto();
    }

    public function createAction(RouteCollection $routes)
    {
        $json = base64_decode(array_keys($_POST)[0]);
        $request = json_decode($json);

        $this->imposto->create((array('value' => $request->value)));
    }

    public function listaAction(RouteCollection $routes)
    {
        $data = $this->imposto->selectAll();
        echo json_encode($data);
    }
}
