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

    public function createAction(RouteCollection $routes)
    {
        $json = base64_decode(array_keys($_POST)[0]);
        $request = json_decode($json);

        $this->product->create(
            array(
                'groups_id' => $request->groups_id,
                'description' => $request->description,
                'category_groups_id' => $request->category_groups_id,
                'value' => $request->value,
                'img' => $request->img
            )
        );
    }
}