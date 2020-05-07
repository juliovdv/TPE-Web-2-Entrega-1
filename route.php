<?php
require_once ('controllers/reseniasController.php');
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// Si la direccion viene vacia lo direcciona a reseñas
if ($_GET['action'] == '')
    $_GET['action'] = 'resenas';

// Divide la direccion en partes, el separador es /
$urlParts = explode('/', $_GET['action']);

// Llama a la funcion correspondiente para cada caso
switch ($urlParts[0]) {
    case 'resenias':
        $controller = new reseniasController();
        $controller->listaTabla('pelicula');
        break;
    case 'detalle':
        $controller = new reseniasController();
        $controller->detalleResenia($urlParts[1]);
        break;
    case 'generos':
        $controller = new reseniasController();
        $controller->listaTabla('genero');
    case 'resenasgenero':
        echo "Aca listado de items por categorias";
        break;
    default:
        echo "<h1>Error 404 - Pagina no encontrada</h1>";
        break;
}
?>