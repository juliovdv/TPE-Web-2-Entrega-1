<?php
include_once('models/generosModel.php');
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');

class reseniasController
{
    private $modelGeneros;
    private $modelResenias;
    private $view;

    public function __construct()
    {
        $this->modelGeneros = new generosModel();
        $this->modelResenias = new reseniasModel();
        $this->view = new reseniasView();
    }

    //Tabla resenias
    //Muestra toda la tabla resenias
    public function tablaResenias()
    {
        $tablaresenia = $this->modelResenias->traerResenias();
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->mostrarResenias($tablaresenia, $tablagenero);
    }
    //Muestra en detalle una resenia
    public function detalleResenia($id)
    {
        $resenia = $this->modelResenias->traerResenia($id);
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->mostrarDetalle($resenia,$tablagenero);
    }
    //Muestra resenias por genero
    public function tablaReseniasporGeneros()
    {
        $tabla = $this->modelResenias->traerReseniasporGeneros();
        $this->view->mostrarReseniasporGenero($tabla);
    }

    //Tabla generos
    //Muestra toda la tabla generos
    public function tablaGeneros()
    {
        $tabla = $this->modelGeneros->traerGeneros();
        $this->view->mostrarGeneros($tabla);
    }

    //Administrador
    public function admin()
    {
        $tablaGeneros = $this->modelGeneros->traerGeneros();
        $tablaResenias = $this->modelResenias->traerResenias();
        $this->view->vistaAdmin($tablaResenias, $tablaGeneros);
    }
    //Tabla Resenias
    //Agrega una resenia
    public function agregarResenia()
    {
        $nombrepelicula = $_POST['nombre_pelicula'];
        $usuario = 'Julio';
        $resenia = $_POST['resenia'];
        $genero = $_POST['genero'];

        $success = $this->modelResenias->guardarResenia($nombrepelicula, $usuario, $resenia, $genero);

        if ($success)
            header('Location: ' . BASE_URL . "admin");
        else
            print_r('Error'); //$this->view->showError("Faltan datos obligatorios"); OJO! Falta
    }
    //Borrar una resenia por id
    public function eliminarResenia($id)
    {
        $this->modelResenias->eliminarReseniaDB($id);
        header('Location: ' . BASE_URL . "admin");
    }

    public function modificarResenia($id)
    {
        $resenia = $this->modelResenias->traerResenia($id);
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->vistaEditarResenia($id, $resenia, $tablagenero);
    }

    public function editarResenia($id)
    {
        $nombrepelicula = $_POST['nombre_pelicula'];
        $usuario = 'Julio';
        $resenia = $_POST['resenia'];
        $genero = $_POST['genero'];
        $this->modelResenias->editarReseniaDB($id, $nombrepelicula, $usuario, $resenia, $genero);
        header('Location: ' . BASE_URL . "admin");
    }

    //Tabla genero
    //Agrega un genero
    public function agregarGenero()
    {
        $genero = $_POST['genero'];
        $success = $this->modelGeneros->guardarGenero($genero);
        if ($success)
            header('Location: ' . BASE_URL . "admin");
        else
            print_r('Error'); //$this->view->showError("Faltan datos obligatorios"); OJO! Falta
    }
    //Eliminar genero
    public function eliminarGenero($id)
    {
        $this->modelGeneros->eliminarGeneroDB($id);
        header('Location: ' . BASE_URL . "admin");
    }

    //Editar Genero
    public function modificarGenero($id){
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->vistaEditarGenero($id, $tablagenero);

    }
    public function editarGenero($id){
        $genero = $_POST['genero'];
        $this->modelGeneros->editarGeneroDB($id, $genero);
        header('Location: ' . BASE_URL . "admin");

    }
}
