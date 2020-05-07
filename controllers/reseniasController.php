<?php
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');

class reseniasController {
    public function __construct() {
        $this->model = new reseniasModel();
        $this->view = new reseniasView();
    }
    public function listaTabla($tabla) {
        $detalletabla = $this->model->traerTabla($tabla);
        $this->view->mostrarTabla($detalletabla);
    }
    public function detalleResenia($id){
        $resenia = $this->model->traerResenia($id);
        $this->view->mostrarDetalle($resenia);
    }
}
?>