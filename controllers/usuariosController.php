<?php

include_once('views/reseniasView.php');
include_once('models/usuariosModel.php');


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
        session_start();
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
                session_start();
                $_SESSION["ID_USUARIO"] = $usuarioDB->id_usuario;
                $_SESSION["USUARIO"] = $usuarioDB->mail;
                header('Location: ' . BASE_URL . "admin");
            } else {
                $this->view->vistaLogin("El campo mail o clave son incorrectos");
            }
        } else {
            $this->view->vistaLogin("Error complete todos los campos");
        }
    }
    //**Elimina la sesion iniciada */
    public function cerrarSesion() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'resenias');
    }
}
