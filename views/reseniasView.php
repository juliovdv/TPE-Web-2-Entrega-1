<?php
require_once('libs/Smarty.class.php');


class reseniasView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', BASE_URL);
        $this->smarty->assign('login', BASE_URL . 'login');
        $this->smarty->assign('resenias', BASE_URL . 'resenias');
        $this->smarty->assign('reseniasgenero', BASE_URL . 'reseniasgenero');
        $this->smarty->assign('admin', BASE_URL . 'admin');
    }

    function mostrarResenias($tablaresenia, $tablagenero)
    {
        $this->smarty->assign('title', 'Reseñas');
        $this->smarty->assign('tablaresenia', $tablaresenia);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/home.tpl');
    }
    function mostrarGeneros($tabla)
    {

        $this->smarty->assign('title', 'Generos');
        $this->smarty->assign('tabla', $tabla);
        $this->smarty->display('templates/listaGeneros.tpl');
    }
    function mostrarReseniasporGenero($tabla)
    {
        $this->smarty->assign('title', 'Reseñas');
        $this->smarty->assign('tabla', $tabla);
        $this->smarty->display('templates/reseniasporgenero.tpl');
    }

    function mostrarDetalle($resenia, $genero)
    {
        $this->smarty->assign('title', 'Generos');
        $this->smarty->assign('resenia', $resenia);
        $this->smarty->assign('genero', $genero->nombre);
        $this->smarty->display('templates/vistaResenia.tpl');
    }

    public function vistaLogin($mensaje = null)
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('title', 'Login');
        $this->smarty->display('templates/login.tpl');
    }
    public function vistaAdmin($tablaresenia, $tablagenero)
    {
        $this->smarty->assign('usuario', $_SESSION["USUARIO"]);
        $this->smarty->assign('title', 'Administrador');
        $this->smarty->assign('tablaresenia', $tablaresenia);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/admin.tpl');
    }

    public function vistaEditarResenia($id, $resenia, $tablagenero)
    {
        $this->smarty->assign('usuario', $_SESSION["USUARIO"]);
        $this->smarty->assign('title', 'Editar Reseña');
        $this->smarty->assign('resenia', $resenia);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/editarResenia.tpl');
    }

    public function vistaEditarGenero($id, $tablagenero)
    {
        $this->smarty->assign('usuario', $_SESSION["USUARIO"]);
        $this->smarty->assign('title', 'Editar Genero');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/editarGenero.tpl');
    }
    public function mensajeError($mensaje)
    {
        if (isset($_SESSION["ID_USUARIO"])) {
            $this->smarty->assign('usuario', $_SESSION["USUARIO"]);
        }
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('title', 'Error');

        $this->smarty->display('templates/error.tpl');
    }
}
