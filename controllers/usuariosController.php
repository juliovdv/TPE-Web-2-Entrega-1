<?php

include_once('views/reseniasView.php');

class usuariosController {

    private $model;
    private $view;

    public function __construct() {
        $this->view = new reseniasView();
    }

    public function mostrarLogin(){
        $this->view->vistaLogin();
    }

    /*-public function verify() {
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            echo $user . ' ' . $pass;
        }
    }*/
}