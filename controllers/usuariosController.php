<?php

include_once('views/reseniasView.php');
include_once('models/usuariosModel.php');
include_once('helpers/auth.helper.php');



class usuariosController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new reseniasView();
        $this->model = new usuariosModel();
    }

    //**Llama a la vista del login */
    public function mostrarLogin()
    {
        AuthHelper::iniciaSesion();
        if (isset($_SESSION["ID_USUARIO"])) {
            $this->view->mensajeError("Ya existe un usuario logueado");
        } else {
            $this->view->vistaLogin();
        }
    }
    //**Verifica la validez de el usuario y la clave */
    public function verificarUsuario()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $usuarioDB = $this->model->traerUsuario($usuario);
            if (!empty($usuarioDB) && password_verify($clave, $usuarioDB->clave)) {
                AuthHelper::logeaUsuario($usuarioDB);
            } else {
                $this->view->vistaLogin("El campo mail o clave son incorrectos");
            }
        } else {
            $this->view->vistaLogin("Error complete todos los campos");
        }
    }
    //**Elimina la sesion iniciada */
    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'resenias');
    }

    public function crearUsuario()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
            $success = $this->model->guardarUsuario($usuario, $clave, '0');
            if ($success){
                $usuarioDB = $this->model->traerUsuario($usuario);
                AuthHelper::logeaUsuario($usuarioDB);}
            else 
                $this->view->vistaLogin("Ya existe un usuario con ese mail");
        } else {
            $this->view->vistaLogin("Error complete todos los campos");
        }
    }
}
?>