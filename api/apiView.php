<?php
    class APIView{
        public function respuesta($tabla){
            header("Content-Type: application/json");
            echo json_encode($tabla);
        }
    }
?>