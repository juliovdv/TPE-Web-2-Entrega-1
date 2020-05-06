<?php
include_once('models/reseniasModel.php');
include_once('views/reseniasView.php');

class Controller {
    public function __construct() {
        $this->model = new reseniasModel();
        $this->view = new reseniasView();
    }

}
?>