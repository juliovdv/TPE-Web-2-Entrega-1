<?php
require_once ('libs/router/Router.php');
require_once ('api/resenias-apiController.php');

//Creo el routeador

$router=new Router();

//Creo la tabla de ruteo

$router->addRoute('resenias', 'GET', 'reseniasapiController', 'obtenerResenias');
$router->addRoute('resenia/:ID','GET', 'resenias-apiController','obtenerResenia');

//Ruteo

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
