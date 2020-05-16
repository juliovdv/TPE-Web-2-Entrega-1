<?php
require_once('libs/Smarty.class.php');

class reseniasView {
    function mostrarResenias ($tablaresenia, $tablagenero){
        $smarty = new Smarty();
        $smarty->assign('title', 'Reseñas');
        $smarty->assign('tablaresenia', $tablaresenia);
        $smarty->assign('tablagenero', $tablagenero);
        $smarty->assign('login', BASE_URL.'login');
        $smarty->assign('resenias', BASE_URL.'resenias');
        $smarty->assign('reseniasgenero', BASE_URL.'reseniasgenero');
        $smarty->assign('admin', BASE_URL.'admin');

        
        $smarty->display('templates/home.tpl');
    }
    function mostrarGeneros ($tabla){
        $smarty = new Smarty();
        $smarty->assign('title', 'Generos');
        $smarty->assign('tabla', $tabla);
        $smarty->assign('login', BASE_URL.'login');
        $smarty->assign('resenias', BASE_URL.'resenias');
        $smarty->assign('reseniasgenero', BASE_URL.'reseniasgenero');
        $smarty->assign('admin', BASE_URL.'admin');

        
        $smarty->display('templates/listaGeneros.tpl');
    }
    function mostrarReseniasporGenero($tabla){
        print_r($tabla);
    }

    function mostrarDetalle ($reseña){
        print_r ($reseña);
    }

    public function vistaLogin() {
        $smarty = new Smarty();
        $smarty->assign('title', 'Login');
        $smarty->assign('login', BASE_URL.'login');
        $smarty->assign('resenias', BASE_URL.'resenias');
        $smarty->assign('reseniasgenero', BASE_URL.'reseniasgenero');
        $smarty->assign('admin', BASE_URL.'admin');


        $smarty->display('templates/login.tpl');
    }
    public function vistaAdmin($tablaresenia, $tablagenero) {
        $smarty = new Smarty();
        $smarty->assign('title', 'Administrador');
        $smarty->assign('tablaresenia', $tablaresenia);
        $smarty->assign('tablagenero', $tablagenero);
        $smarty->assign('login', BASE_URL.'login');
        $smarty->assign('resenias', BASE_URL.'resenias');
        $smarty->assign('reseniasgenero', BASE_URL.'reseniasgenero');
        $smarty->assign('admin', BASE_URL.'admin');

        $smarty->display('templates/admin.tpl');

    }
}
?>