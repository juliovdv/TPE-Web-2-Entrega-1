<?php
include_once('models/generosModel.php');
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');

class reseniasController {
    private $modelGeneros;
    private $modelResenias;
    private $view;

    public function __construct() {
        $this->modelGeneros = new generosModel();
        $this->modelResenias = new reseniasModel();
        $this->view = new reseniasView();
    }

//Tabla resenias
    //Muestra toda la tabla resenias
    public function tablaResenias() {
        $tablaresenia = $this->modelResenias->traerResenias();
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->mostrarResenias($tablaresenia, $tablagenero);
    }
    //Muestra en detalle una resenia
    public function detalleResenia($id){
        $resenia = $this->modelResenias->traerResenia($id);
        $this->view->mostrarDetalle($resenia);
    }
    //Muestra resenias por genero
    public function tablaReseniasporGeneros(){
        $tabla = $this->modelResenias->traerReseniasporGeneros();
        $this->view->mostrarReseniasporGenero($tabla);
    }
    
//Tabla generos
    //Muestra toda la tabla generos
    public function tablaGeneros() {
        $tabla = $this->modelGeneros->traerGeneros();
        $this->view->mostrarGeneros($tabla);
    }

//Administrador
    public function admin(){
        $tablaGeneros = $this->modelGeneros->traerGeneros();
        $tablaResenias = $this->modelResenias->traerResenias();
        $this->view->vistaAdmin($tablaResenias, $tablaGeneros);
    }
    //Tabla Resenias
        //Agrega una resenia
    public function agregarResenia() {
        $nombrepelicula = $_POST['nombre_pelicula'];
        $usuario = 'Julio';
        $resenia = $_POST['resenia']; 
        $genero = $_POST['genero'];

        $success = $this->modelResenias->guardarResenia($nombrepelicula, $usuario, $resenia, $genero);

        if($success)
            header('Location: ' . BASE_URL . "admin");
        else
            print_r('Error');//$this->view->showError("Faltan datos obligatorios"); OJO! Falta
    }
        //Borrar una resenia por id
    public function eliminarResenia($id) {
        $this->modelResenias->eliminarReseniaDB($id);
        header('Location: ' . BASE_URL . "admin");    
    }

    //Tabla genero
        //Agrega un genero
    public function agregarGenero() {
        $genero = $_POST['genero'];
        $success = $this->modelGeneros->guardarGenero($genero);
        if($success)
            header('Location: ' . BASE_URL . "admin");
        else
            print_r('Error');//$this->view->showError("Faltan datos obligatorios"); OJO! Falta
    }
}
