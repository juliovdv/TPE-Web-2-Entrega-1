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
        $this->view->respuesta($tablacomentarios, 200);
    }
    public function borrarComentario($params = []){
        $id = $params[':ID'];
        $comentario = $this->modelComentarios->traerComentarioporID($id);
        if (empty($comentario)) {
            $this->view->response("no existe el comentario con id {$id}", 404);
            die;
        }
        $this->modelComentarios->eliminarComentarioDB($id);
        $this->view->response("El comentario con id:  {$id} se elimino correctamente", 200);
    }
    public function agregarComentario() {
        $body = $this->getData();

        $id_resenia = $body->id_resenia;
        $comentario = $body->comentario;
        $usuario = $body->usuario;
        $puntuacion = $body->puntuacion;
        $this->modelComentarios->guardarComentario($id_resenia, $comentario, $usuario, $puntuacion); 
       
    }
    public function getData(){
        return json_decode($this->data);
    }
}
?>