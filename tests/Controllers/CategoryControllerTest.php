<?php declare(strict_types=1);
namespace Tests\Feature\Controllers;
require_once './config/config.php';

use App\Controllers\CategoryController;
use App\Models\Category;
use GuzzleHttp\Client;
use \PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\RouteCollection;

class CategoryControllerTest extends TestCase
{
    protected $controller;
    protected $category;
    protected $http;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new CategoryController();
        $this->category = new Category();
        $this->http = new Client(['base_uri' => SITE_HOST]);
    }

    public function test_create_action()
    {
        $response = $this->http->request('POST', '/index.php/imposto/create', [
                'form_params' => ['value' => '100']
            ]
        );

        $response = $this->http->request('POST', '/index.php/categoria/create', [
                'form_params' => ['name' => 'teste', 'imposto_id' => 1]
            ]
        );
        $this->assertEquals(200, $response->getStatusCode());
        $this->controller->createAction(new RouteCollection);
        $this->assertTrue(true);
    }

    public function test_lista_action() {
        $response = $this->http->request('POST', '/index.php/categoria/lista');
        $this->assertEquals(200, $response->getStatusCode());
        $this->expectOutputRegex('/./');
        $this->controller->listaAction(new RouteCollection);
    }
}
