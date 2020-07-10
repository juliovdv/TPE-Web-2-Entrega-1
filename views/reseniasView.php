<?php
require_once('libs/smarty/Smarty.class.php');
include_once('helpers/auth.helper.php');


class reseniasView
{

    private $smarty;

    function __construct()
    {
        $authHelper = new AuthHelper();
        $usuario = $authHelper->hayUsuario();
        $esAdmin = $authHelper->esAdmin();
        $this->smarty = new Smarty();
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->assign('esadmin', $esAdmin);
        $this->smarty->assign('url', BASE_URL);
        $this->smarty->assign('login', BASE_URL . 'login');
        $this->smarty->assign('resenias', BASE_URL . 'resenias');
        $this->smarty->assign('reseniasgenero', BASE_URL . 'reseniasgenero');
        $this->smarty->assign('admin', BASE_URL . 'admin');
        $this->smarty->assign('usuarios', BASE_URL . 'usuarios');
    }
    //**Vista de la pantalla home, muestra la lista de generos y la lista de reseñas */
    function mostrarResenias($tablaresenia, $tablagenero)
    {
        $this->smarty->assign('title', 'Reseñas');
        $this->smarty->assign('tablaresenia', $tablaresenia);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/home.tpl');
    }
    //**Muestra la lista genero */
    function mostrarGeneros($tabla)
    {
        $this->smarty->assign('title', 'Generos');
        $this->smarty->assign('tabla', $tabla);
        $this->smarty->display('templates/listaGeneros.tpl');
    }

    //** Muestra la lista de reseñas */
    function mostrarReseniasporGenero($tabla)
    {
        $this->smarty->assign('title', 'Reseñas');
        $this->smarty->assign('tabla', $tabla);
        $this->smarty->display('templates/reseniasporgenero.tpl');
    }
    //**Muestra e detalle de una reseña  */
    function mostrarDetalle($resenia, $genero)
    {
        $this->smarty->assign('title', 'Detalle');
        $this->smarty->assign('resenia', $resenia);
        $this->smarty->assign('genero', $genero->nombre);
        $this->smarty->display('templates/vistaResenia.tpl');
    }
    //**Muestra la pantalla del login */
    public function vistaLogin($mensaje = null)
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('title', 'Login');
        $this->smarty->display('templates/login.tpl');
    }
    //**Muestra la vista de administrador */
    public function vistaAdmin($tablaresenia, $tablagenero)
    {
        $this->smarty->assign('title', 'Administrador');
        $this->smarty->assign('tablaresenia', $tablaresenia);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/admin.tpl');
    }
    public function vistaUsuarios($tabla)
    {
        $this->smarty->assign('title', 'Administrador usuarios');
        $this->smarty->assign('tablausuario', $tabla);
        $this->smarty->display('templates/usuarios.tpl');
    }
    //** Muestra el formulario para editar reseñas */
    public function vistaEditarResenia($id, $resenia, $tablagenero)
    {
        $this->smarty->assign('title', 'Editar Reseña');
        $this->smarty->assign('resenia', $resenia);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/editarResenia.tpl');
    }
    //**Muestra el formulario de editar genero */
    public function vistaEditarGenero($id, $tablagenero)
    {
        $this->smarty->assign('title', 'Editar Genero');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/editarGenero.tpl');
    }
    //**Recibe un error por parametro y lo muestra */
    public function mensajeError($mensaje)
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('title', 'Error');

        $this->smarty->display('templates/error.tpl');
    }
    public function mensajeErrorPermisos($mensaje)
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('title', 'Error');

        $this->smarty->display('templates/errorPermisos.tpl');
    }
}
