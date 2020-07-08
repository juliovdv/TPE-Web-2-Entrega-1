<?php
require_once ('libs/router/Router.php');
require_once ('api/resenias-apiController.php');

//Creo el routeador

$router=new Router();

//Creo la tabla de ruteo

$router->addRoute('resenias/:ID/comentarios', 'GET', 'reseniasapiController', 'obtenerComentarios');
$router->addRoute('comentario/:ID','GET', 'reseniasapiController','obtenerComentarios');
$router->addRoute('comentario/:ID','DELETE', 'reseniasapiController','borrarComentario');
$router->addRoute('comentario','POST', 'reseniasapiController','agregarComentario');



//Ruteo

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
