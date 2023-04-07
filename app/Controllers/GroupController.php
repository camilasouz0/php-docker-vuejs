<?php

namespace App\Controllers;

use App\Models\Groups;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;


class GroupController 
{
    private $groups;

    public function __construct()
    {
        $this->groups = new Groups();
    }

    public function createAction(RouteCollection $routes)
    {
        $json = base64_decode(array_keys($_POST)[0]);
        $request = json_decode($json);

        $this->groups->create((array('name' => $request->name)));
    }

    public function listaAction(RouteCollection $routes)
    {
        $data = $this->groups->selectAll();
        echo json_encode($data);
    }
}
