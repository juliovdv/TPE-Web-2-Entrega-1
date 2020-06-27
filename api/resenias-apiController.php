<?php
require_once 'models/reseniasModel.php';
require_once 'models/comentariosModel.php'; 
require_once 'api/apiView.php'; 


class reseniasapiController{
    
    private $modelGeneros;
    private $modelResenias;
    private $view;

    public function __construct()
    {
        $this->modelComentarios = new comentariosModel();
        $this->modelResenias = new reseniasModel();
        $this->view = new APIView();

    }
    public function obtenerComentarios($params = []){
        $id = $params[':ID'];
        $tablacomentarios = $this->modelComentarios->traerComentariosporResenia($id);
        $this->view->respuesta($tablacomentarios);
    }
    public function borrarComentarios($params = []){
        $id = $params[':ID'];
        $this->modelComentarios->eliminarComentarioDB($id);
    }
}
?>