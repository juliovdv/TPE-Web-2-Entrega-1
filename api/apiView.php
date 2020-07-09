<?php
    class APIView{
        public function respuesta($tabla, $status){
            header("Content-Type: application/json");
            echo json_encode($tabla);
        }
        private function _requestStatus($code){
            $status = array(
                200 => "OK",
                404 => "Not found",
                500 => "Internal Server Error"
            );
            return (isset($status[$code]))? $status[$code] : $status[500];
        } 
    }
?>