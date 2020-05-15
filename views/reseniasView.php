<?php
require_once('libs/Smarty.class.php');

class reseniasView {
    function mostrarResenias ($tabla){
        $smarty = new Smarty();
        $smarty->assign('title', 'Reseñas');
        $smarty->assign('tabla', $tabla);
        $smarty->assign('login', BASE_URL.'login');
        $smarty->assign('resenias', BASE_URL.'resenias');
        $smarty->assign('generos', BASE_URL.'generos');
        
        $smarty->display('templates/listaResenias.tpl');
    }
    function mostrarGeneros ($tabla){
        $smarty = new Smarty();
        $smarty->assign('title', 'Generos');
        $smarty->assign('tabla', $tabla);
        $smarty->assign('login', BASE_URL.'login');
        $smarty->assign('resenias', BASE_URL.'resenias');
        $smarty->assign('generos', BASE_URL.'generos');
        
        $smarty->display('templates/listaGeneros.tpl');
    }

    function mostrarDetalle ($reseña){
        print_r ($reseña);
    }
}
?>