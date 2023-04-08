<?php declare(strict_types=1);
namespace Tests\Feature\Controllers;
require_once './config/config.php';

use App\Controllers\ImpostoController;
use App\Models\Imposto;
use GuzzleHttp\Client;
use \PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\RouteCollection;

class ImpostoControllerTest extends TestCase
{
    protected $controller;
    protected $imposto;
    protected $http;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new ImpostoController();
        $this->imposto = new Imposto();
        $this->http = new Client(['base_uri' => SITE_HOST]);
    }

    public function test_create_action()
    {
        $response = $this->http->request('POST', '/index.php/imposto/create', [
                'form_params' => ['value' => 10.0],
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());
        $this->controller->createAction(new RouteCollection);
        $this->assertTrue(true);
    }

    public function test_lista_action() {
        $response = $this->http->request('POST', '/index.php/imposto/lista');
        $this->assertEquals(200, $response->getStatusCode());
        $this->expectOutputRegex('/./');
        $this->controller->listaAction(new RouteCollection);
    }
}
