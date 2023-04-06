<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method'=>'indexAction'), array()));
$routes->add('product', new Route(constant('URL_SUBFOLDER') . '/product/{id}', array('controller' => 'ProductController', 'method'=>'showAction'), array('id' => '[0-9]+')));

$routes->add('product.lista',
      new Route(constant('URL_SUBFOLDER') . '/lista',
      array('controller' => 'ProductController', 'method'=>'listaTodosAction'),
      array())
);

$routes->add('product.lista.um',
      new Route(constant('URL_SUBFOLDER') . '/lista/{id}',
      array('controller' => 'ProductController', 'method'=>'listaUmAction'),
      array())
);