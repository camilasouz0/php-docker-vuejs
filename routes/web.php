<?php

use App\Controllers\GroupController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('product', new Route(constant('URL_SUBFOLDER') . '/product/{id}', array('controller' => 'ProductController', 'method'=>'showAction'), array('id' => '[0-9]+')));

$routes->add('product.lista',
      new Route(constant('URL_SUBFOLDER') . '/produto/lista',
      array('controller' => 'ProductController', 'method'=>'listaAction'),
      array())
);

$routes->add('product.lista.um',
      new Route(constant('URL_SUBFOLDER') . '/lista/{id}',
      array('controller' => 'ProductController', 'method'=>'listaUmAction'),
      array())
);
$routes->add('produto.create', new Route(constant('URL_SUBFOLDER') . '/produto/create', array('controller' => 'ProductController', 'method'=>'createAction'), array()));
$routes->add('produto.update', new Route(constant('URL_SUBFOLDER') . '/produto/update', array('controller' => 'ProductController', 'method'=>'updateAction'), array('id' => '[0-9]+')));

$routes->add('grupo', new Route(constant('URL_SUBFOLDER') . '/grupo/create', array('controller' => 'GroupController', 'method'=>'createAction'), array()));
$routes->add('grupo.lista', new Route(constant('URL_SUBFOLDER') . '/grupo/lista', array('controller' => 'GroupController', 'method'=>'listaAction'), array()));

$routes->add('categoria', new Route(constant('URL_SUBFOLDER') . '/categoria/create', array('controller' => 'CategoryController', 'method'=>'createAction'), array()));
$routes->add('categoria.lista', new Route(constant('URL_SUBFOLDER') . '/categoria/lista', array('controller' => 'CategoryController', 'method'=>'listaAction'), array()));

