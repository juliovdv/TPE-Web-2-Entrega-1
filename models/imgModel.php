<?php

require_once('model.php');

class TaskModel extends model {
    public function guardarImagen($id_resenia, $imagen){
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);
            print_r($pathImg);
        $sentencia = $this->db->prepare('INSERT INTO img (img, id_resenia) VALUES (?, ?)');
        return $sentencia->execute([$pathImg, $id_resenia]);
    }
}