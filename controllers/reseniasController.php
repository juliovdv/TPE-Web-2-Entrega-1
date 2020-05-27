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

    //** Muestra toda la tabla resenias */
    public function listaResenias()
    {
        $tablaresenia = $this->modelResenias->traerResenias();
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->mostrarResenias($tablaresenia, $tablagenero);
    }
    //** Muestra en detalle una resenia */
    public function detalleResenia($id)
    {
        $resenia = $this->modelResenias->traerResenia($id);
        $genero = $this->modelGeneros->traerGenerosporID($resenia->id_genero);
        $this->view->mostrarDetalle($resenia, $genero);
    }
    //** Muestra tolas las reseñas agrupadas por genero */
    public function listaReseniasporGeneros()
    {
        $tabla = $this->modelResenias->traerReseniasporGeneros();
        $this->view->mostrarReseniasporGenero($tabla);
    }

    //** Toma id de generos y filtra las reseñas que corresponden a este */
    public function listaReseniasxGeneros($id_genero)
    {
        $tablaresenia = $this->modelResenias->filtrarReseniasxGeneros($id_genero);
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->mostrarResenias($tablaresenia, $tablagenero);
    }

    //Tabla generos

    //** Trae la tabla de generos y llama a la vista para mostrarlo */
    public function listaGeneros()
    {
        $tabla = $this->modelGeneros->traerGeneros();
        $this->view->mostrarGeneros($tabla);
    }

    //Funciones de adminiostrador

    //**Llama a la funcion vista Administrador */
    public function admin()
    {
        $this->sesionIniciada();
        $tablaGeneros = $this->modelGeneros->traerGeneros();
        $tablaResenias = $this->modelResenias->traerResenias();
        $this->view->vistaAdmin($tablaResenias, $tablaGeneros);
    }
    //Tabla Resenias

    //**Toma los valores por POST y llama a la funcion para agregar una reseña a la base de datos */
    public function agregarResenia()
    {
        $this->sesionIniciada();
        $nombrepelicula = $_POST['nombre_pelicula'];
        $usuario =  $_SESSION["USUARIO"];
        $resenia = $_POST['resenia'];
        $genero = $_POST['genero'];
        if (empty($nombrepelicula) || empty($usuario) || empty($resenia) || empty($resenia))
            $this->view->mensajeError("Complete todos los campos");
        else
            $success = $this->modelResenias->guardarResenia($nombrepelicula, $usuario, $resenia, $genero);

        if ($success)
            header('Location: ' . BASE_URL . "admin");
        else
            $this->view->mensajeError("El agregado no ha se completo correctamente");
    }
    //**Toma el id de una reseña y llama a la funcion para eliminarla de la base de datos */
    public function eliminarResenia($id)
    {
        $this->sesionIniciada();
        $this->modelResenias->eliminarReseniaDB($id);
        header('Location: ' . BASE_URL . "admin");
    }
    //**Llama a la vista Editar reseña */
    public function modificarResenia($id)
    {
        $this->sesionIniciada();
        $resenia = $this->modelResenias->traerResenia($id);
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->vistaEditarResenia($id, $resenia, $tablagenero);
    }
    //**Toma los datos por POST y llama a la funcion para modificarlos en la base de datos segun el ID  */
    public function editarResenia($id)
    {
        if (!empty($nombrepelicula) || !empty($usuario) || !empty($resenia) || !empty($resenia)) {
            $this->sesionIniciada();
            $nombrepelicula = $_POST['nombre_pelicula'];
            $usuario =  $_SESSION["USUARIO"];
            $resenia = $_POST['resenia'];
            $genero = $_POST['genero'];
            $this->modelResenias->editarReseniaDB($id, $nombrepelicula, $usuario, $resenia, $genero);
            header('Location: ' . BASE_URL . "admin");
        } else
            $this->view->mensajeError("Complete todos los campos");
    }

    //Tabla genero

    //** Agrega un genero */
    public function agregarGenero()
    {
        $this->sesionIniciada();
        $genero = $_POST['genero'];
        if (empty($genero))
            $this->view->mensajeError("Complete todos los campos");
        else
            $success = $this->modelGeneros->guardarGenero($genero);
        if ($success)
            header('Location: ' . BASE_URL . "admin");
        else
            $this->view->mensajeError("El agregado no ha se completo correctamente ");
    }
    //** Eliminar genero por id */
    public function eliminarGenero($id)
    {
        $this->sesionIniciada();
        $success = $this->modelGeneros->eliminarGeneroDB($id);
        if ($success)
            header('Location: ' . BASE_URL . "admin");
        else
            $this->view->mensajeError("El eliminado no ha se completo correctamente, es posible que alla reseñas vinculadas a este genero. ");
    }

    //** Llama a la vista editar genero */
    public function modificarGenero($id)
    {
        $this->sesionIniciada();
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->vistaEditarGenero($id, $tablagenero);
    }
    //** Toma parametros por POST y llama a la funcion para editar un genero */
    public function editarGenero($id)
    {
        $this->sesionIniciada();
        $genero = $_POST['genero'];
        if (!empty($genero)) {
            $this->modelGeneros->editarGeneroDB($id, $genero);
            header('Location: ' . BASE_URL . "admin");
        } else
            $this->view->mensajeError("Complete todos los campos");
    }

    //**Si no hay sesion iniciada te lleva a la pantalla de login */
    private function sesionIniciada()
    {
        session_start();
        if (!isset($_SESSION["ID_USUARIO"])) {
            $this->view->vistaLogin("Esta opcion requiere ser un usuario registrado");
            die();
        }
    }
}
