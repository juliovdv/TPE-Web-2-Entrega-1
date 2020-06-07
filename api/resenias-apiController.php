<?php
require_once 'models/reseniasModel.php';
require_once 'models/generosModel.php'; 
require_once 'api/apiView.php'; 


class reseniasapiController{
    
    private $modelGeneros;
    private $modelResenias;
    private $view;

    public function __construct()
    {
        $this->modelGeneros = new generosModel();
        $this->modelResenias = new reseniasModel();
        $this->view = new APIView();

    }
    public function obtenerResenias(){
        $tablaresenia = $this->modelResenias->traerResenias();
        $tablagenero = $this->modelGeneros->traerGeneros();
        $this->view->respuesta($tablaresenia);
    }
}
?>