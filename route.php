<?php
require_once ('controllers/reseniasController.php');
require_once ('controllers/usuariosController.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// Si la direccion viene vacia lo direcciona a reseñas
if ($_GET['action'] == '')
    $_GET['action'] = 'resenias';

// Divide la direccion en partes, el separador es /
$urlParts = explode('/', $_GET['action']);

// Llama a la funcion correspondiente para cada caso
switch ($urlParts[0]) {
    case 'resenias':
        $controller = new reseniasController();
        $controller->tablaResenias();
        break;
    case 'detalle':
        $controller = new reseniasController();
        $controller->detalleResenia($urlParts[1]);
        break;
    case 'generos':
        $controller = new reseniasController();
        $controller->tablaGeneros();
        break;
    case 'reseniasgenero':
        $controller = new reseniasController();
        $controller->tablaReseniasporGeneros();
        break;
    case 'login':
        $controller = new usuariosController();
        $controller->mostrarLogin();
        break;
    case 'admin':
        $controller = new reseniasController();
        $controller->admin();
        break;
    case 'agregarresenia':
        $controller = new reseniasController();
        $controller->agregarResenia();
        break;
    case 'eliminarresenia':
        $controller = new reseniasController();
        $controller->eliminarResenia($urlParts[1]);
        break;
    case 'agregargenero':
        $controller = new reseniasController();
        $controller->agregarGenero();
        break;
    case 'eliminargenero':
        $controller = new reseniasController();
        //$controller->eliminarGenero($urlParts[1]); OJO! Falta
        break;
    default:
        echo "<h1>Error 404 - Pagina no encontrada</h1>";
        break;
}
?>