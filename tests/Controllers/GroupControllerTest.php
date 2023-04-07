<?php declare(strict_types=1);
namespace Tests\Feature\Controllers;
require_once './config/config.php';

use App\Controllers\GroupController;
use App\Models\Groups;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\ServerRequest;
use \PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\RouteCollection;

class GroupControllerTest extends TestCase
{
    protected $controller;
    protected $groups;
    protected $http;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new GroupController();
        $this->groups = new Groups();
        $this->http = new Client(['base_uri' => SITE_HOST]);
    }

    public function test_create_action()
    {
        // $request = new ServerRequest('POST', '/index.php/grupo/create', ['name' => 'teste']);

        $response = $this->http->request('POST', '/index.php/grupo/create', [
                'form_params' => ['name' => 'teste']
            ]
        );
        $this->assertEquals(200, $response->getStatusCode());
        $this->controller->createAction(new RouteCollection);
        $this->assertTrue(true);
    }
}
