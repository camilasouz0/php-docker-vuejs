<?php 

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class ProductController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function listaAction(RouteCollection $routes) {
        $data = $this->product->selectAll();
        echo json_encode($data);
    }

    public function listaUmAction($id, RouteCollection $routes) {
        echo $this->product->select($id);
    }

    public function createAction(array $data)
    {
        $this->product->create(array());
    
        return $this;
    }
}