<?php
require_once ('libs/router/Router.php');
require_once ('api/resenias-apiController.php');

//Creo el routeador

$router=new Router();

//Creo la tabla de ruteo

$router->addRoute('resenias/:ID', 'GET', 'reseniasapiController', 'obtenerComentarios');//game/:ID/comments
$router->addRoute('resenia/:ID','GET', 'reseniasapiController','obtenerComentarios');
$router->addRoute('resenia/:ID','DELETE', 'reseniasapiController','borrarComentario');
$router->addRoute('resenia','POST', 'reseniasapiController','agregarComentario');



//Ruteo

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
