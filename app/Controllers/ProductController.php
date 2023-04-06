<?php 

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;
use App\Classes\Database;

class ProductController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

	public function showAction(int $id, RouteCollection $routes)
	{   
        // require_once APP_ROOT . '/views/components/scripts.php';
        // require_once APP_ROOT . '/views/components/sidebar.php';
        require_once APP_ROOT . './views/product.php';
	}

    public function listaTodosAction(RouteCollection $routes) {
        echo $this->product->selectAll();
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