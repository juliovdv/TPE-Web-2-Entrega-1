<?php
require_once 'models/reseniasModel.php';
require_once 'models/comentariosModel.php'; 
require_once 'api/apiView.php'; 


class reseniasapiController{
    
    private $modelComentarios;
    private $modelResenias;
    private $view;
    private $dato;

    public function __construct()
    {
        $this->modelComentarios = new comentariosModel();
        $this->modelResenias = new reseniasModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");


    }
    public function obtenerComentarios($params = []){
        $id = $params[':ID'];
        $tablacomentarios = $this->modelComentarios->traerComentariosporResenia($id);
        $this->view->respuesta($tablacomentarios);
    }
    public function borrarComentario($params = []){
        $id = $params[':ID'];
        $this->modelComentarios->eliminarComentarioDB($id);
    }
    public function agregarComentario() {
        $body = $this->getData();

        $id_resenia = $body->id_resenia;
        $comentario = $body->cometario;
        $usuario = $body->usuario;
        $puntuacion = $body->puntuacion;
        $this->modelComentarios->guardarComentario($id_resenia, $comentario, $usuario, $puntuacion); 
       
    }
    public function getData(){
        return json_decode($this->data);
    }
}
?>