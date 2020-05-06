<?php
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');

class reseniasController {
    public function __construct() {
        $this->model = new reseniasModel();
        $this->view = new reseniasView();
    }
    public function listaResenias() {
        $resenias = $this->model->buscarResenias();
        $this->view->mostrarResenias($resenias);
    }
}
?>