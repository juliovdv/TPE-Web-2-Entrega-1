<?php
include_once('models/generosModel.php');
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');

class reseniasController {
    public function __construct() {
        $this->modelGeneros = new generosModel();
        $this->modelResenias = new reseniasModel();
        $this->view = new reseniasView();
    }

//Tabla resenias
    //Muestra toda la tabla resenias
    public function tablaResenias() {
        $detalletabla = $this->modelResenias->traerResenias();
        $this->view->mostrarResenias($detalletabla);
    }
    //Muestra en detalle una resenia
    public function detalleResenia($id){
        $resenia = $this->modelResenias->traerResenia($id);
        $this->view->mostrarDetalle($resenia);
    }
    //Agrega una resenia
    public function agregarResenia() {
        $nombrepelicula = $_POST['nombre_pelicula'];
        $usuario = 'Julio';
        $resenia = $_POST['resenia']; 
        $genero = $_POST['genero'];

        $success = $this->modelResenias->guardarResenia($nombrepelicula, $usuario, $resenia, $genero);

        if($success)
            header('Location: ' . BASE_URL . "resenias");
        else
            print_r('Error');//$this->view->showError("Faltan datos obligatorios"); OJO! Falta
    }
    public function eliminarResenia($id) {
        $this->modelResenias->eliminarReseniaDB($id);
        header('Location: ' . BASE_URL . "resenias");    }

//Tabla generos
    //Muestra toda la tabla generos
    public function tablaGeneros() {
        $detalletabla = $this->modelGeneros->traerGeneros();
        $this->view->mostrarGeneros($detalletabla);
    }
}
