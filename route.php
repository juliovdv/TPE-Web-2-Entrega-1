<?php
require_once ('controllers/reseniasController.php');
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
    case 'resenasgenero':
        $controller = new reseniasController();
        //$controller->listaReseniasporGenero($urlParts[1]); OJO! Falta
        break;
    case 'agregarresenia':
        $controller = new reseniasController();
        $controller->agregarResenia();
        break;
    case 'agregargenero':
        $controller = new reseniasController();
        //$controller->agregarGenero(); OJO! Falta
        break;
    default:
        echo "<h1>Error 404 - Pagina no encontrada</h1>";
        break;
}
?>