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
        $controller->listaResenias();
        break;
    case 'detalle':
        $controller = new reseniasController();
        $controller->detalleResenia($urlParts[1]);
        break;
    case 'generos':
        $controller = new reseniasController();
        $controller->listaGeneros();
        break;
    case 'reseniasxgenero':
        $controller = new reseniasController();
        $controller->listaReseniasxGeneros($urlParts[1]);
        break;
    case 'reseniasgenero':
        $controller = new reseniasController();
        $controller->listaReseniasporGeneros();
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
    case 'modificarresenia':
        $controller = new reseniasController();
        $controller->modificarResenia($urlParts[1]);
        break;
    case 'editarresenia':
        $controller = new reseniasController();
        $controller->editarResenia($urlParts[1]);
        break;    
    case 'agregargenero':
        $controller = new reseniasController();
        $controller->agregarGenero();
        break;
    case 'eliminargenero':
        $controller = new reseniasController();
        $controller->eliminarGenero($urlParts[1]); 
        break;
    case 'modificargenero':
        $controller = new reseniasController();
        $controller->modificarGenero($urlParts[1]);
        break;
    case 'editargenero':
        $controller = new reseniasController();
        $controller->editarGenero($urlParts[1]);
        break;
    case 'verificar':
        $controller = new usuariosController();
        $controller->verificarUsuario();
        break;
    case 'crearusuario':
        $controller = new usuariosController();
        $controller->crearUsuario();
        break;
    
    case 'salir':
        $controller = new usuariosController();
        $controller->cerrarSesion();
        break;
    default:
        echo "<h1>Error 404 - Pagina no encontrada</h1>";
        break;
}
?>