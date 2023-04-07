<?php 

namespace App\Controllers;

use App\Models\Product;
use PhpParser\Node\Expr\Cast\Double;
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
                'description' => isset($request->description) && !empty($request->description) ? $request->description : 'null',
                'category_products_id' => $request->category_products_id,
                'value' => isset($request->value) && !empty($request->value) ? (Double)$request->value : 'null',
                'img' => isset($request->img) && !empty($request->img) ? $request->img : 'null'
            )
        );
    }
}