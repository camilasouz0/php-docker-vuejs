<?php declare(strict_types=1);
namespace Tests\Feature\Controllers;
require_once './config/config.php';

use App\Controllers\ProductController;
use App\Models\Imposto;
use App\Models\Product;
use GuzzleHttp\Client;
use \PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\RouteCollection;

class ProductsControllerTest extends TestCase
{
    protected $controller;
    protected $product;
    protected $http;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new ProductController();
        $this->product = new Product();
        $this->http = new Client(['base_uri' => SITE_HOST]);
    }

    public function test_create_action()
    {
        $response = $this->http->request('POST', '/index.php/produto/create', [
                'form_params' => ['groups_id' => 1, 'category_products_id' => 1],
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());
        $this->controller->createAction(new RouteCollection);
        $this->assertTrue(true);
    }

    public function test_lista_action() {
        $response = $this->http->request('POST', '/index.php/produto/lista');
        $this->assertEquals(200, $response->getStatusCode());
        $this->expectOutputRegex('/./');
        $this->controller->listaAction(new RouteCollection);
    }

    public function test_lista_um_action() {
        $response = $this->http->request('POST', '/index.php/lista/'+1);
        $this->assertEquals(200, $response->getStatusCode());
        $this->expectOutputRegex('/./');
        $this->controller->listaAction(1,new RouteCollection);
    }


}
