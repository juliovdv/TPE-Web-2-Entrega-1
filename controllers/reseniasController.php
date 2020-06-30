<?php
include_once('models/generosModel.php');
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');
include_once('helpers/auth.helper.php');




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
   
}
?>
