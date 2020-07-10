<?php
require_once 'models/reseniasModel.php';
require_once 'models/comentariosModel.php'; 
require_once 'api/apiView.php'; 


class reseniasapiController{
    
    private $modelComentarios;
    private $view;
    private $data;

    public function __construct()
    {
        $this->modelComentarios = new comentariosModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");


    }

    /**
     * Toma id, ordenpor y orden, recibe del modelo y manda a la vista la lista de comentarios ordenados
     */
    public function obtenerComentarios($params = []){
        $id = $params[':ID'];
        $ordenpor = $params[':ORDENPOR'];
        $orden = $params[':ORDEN'];
        if (($ordenpor="id_comentario") || ($ordenpor="usuario") || ($ordenpor="puntuacion") && ($orden="ASC") || ($orden="DESC")){
            $tablacomentarios = $this->modelComentarios->traerComentariosporResenia($id, $ordenpor, $orden);
            $this->view->respuesta($tablacomentarios, 200);}
        else
            $this->view->respuesta("el valor de ordenado no se corresponde con uno disponible", 404);
    }
    /**
     * Toma id y lo pasa al modelo para que sea borrado
    */
    public function borrarComentario($params = []){
        $id = $params[':ID'];
        $comentario = $this->modelComentarios->traerComentarioporID($id);
        if (empty($comentario)) {
            $this->view->respuesta("no existe el comentario con id {$id}", 404);
            die;
        }
        $this->modelComentarios->eliminarComentarioDB($id);
        $this->view->respuesta("El comentario con id:  {$id} se elimino correctamente", 200);
    }
    /**
     * Toma body con valores y los pasa al modelo para que sean guardados
     */
    public function agregarComentario() {
        $body = $this->getData();

        $id_resenia = $body->id_resenia;
        $comentario = $body->comentario;
        $usuario = $body->usuario;
        $puntuacion = $body->puntuacion;
        $respuesta=$this->modelComentarios->guardarComentario($id_resenia, $comentario, $usuario, $puntuacion);
        $this->view->respuesta($respuesta, 200); 
       
    }
    public function getData(){
        return json_decode($this->data);
    }
}
?>