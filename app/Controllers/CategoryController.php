<?php

namespace App\Controllers;

use App\Models\Category;
use Symfony\Component\Routing\RouteCollection;


class CategoryController 
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function createAction(RouteCollection $routes)
    {
        $json = base64_decode(array_keys($_POST)[0]);
        $request = json_decode($json);

        $this->category->create((array('name' => $request->name)));
    }

    public function listaAction(RouteCollection $routes)
    {
        $data = $this->category->selectAll();
        echo json_encode($data);
    }
}
