<?php
class AuthHelper {
    public function __construct(){}
    
    
    public static function iniciaSesion(){
        if (session_status() != PHP_SESSION_ACTIVE ){
            session_start();
        }
    }

 //**Si no hay sesion iniciada te lleva a la pantalla de login */
    public static function estaLogueado()//sesionIniciada()
    {
        self::iniciaSesion();
        if (!isset($_SESSION["ID_USUARIO"])) {
            header('Location: ' . BASE_URL . "login");//$this->view->vistaLogin("Esta opcion requiere ser un usuario registrado");
            die();
        }
    }
    public static function logeaUsuario($usuario){
        self::iniciaSesion();
        $_SESSION["ID_USUARIO"] = $usuario->id_usuario;
        $_SESSION["USUARIO"] = $usuario->mail;
        $_SESSION["ADMIN"] = $usuario->admin;
        header('Location: ' . BASE_URL . "admin");
    }
    public static function esAdmin(){
        self::iniciaSesion();
        $esAdmin = false;
        if (isset($_SESSION["ID_USUARIO"]) && ($_SESSION["ADMIN"] == '1')) {
            $esAdmin = true;
        }
        return $esAdmin;
    }
    public static function hayUsuario() {
        self::iniciaSesion();
        if (isset($_SESSION['USUARIO'])){
            return $_SESSION['USUARIO'];
        }
        else {
            return false;
        }
    }
}
?>