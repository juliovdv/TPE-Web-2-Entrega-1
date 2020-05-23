<?php
require_once('libs/Smarty.class.php');


class reseniasView {
    
    private $smarty;
    
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', BASE_URL);
        $this->smarty->assign('login', BASE_URL.'login');
        $this->smarty->assign('resenias', BASE_URL.'resenias');
        $this->smarty->assign('reseniasgenero', BASE_URL.'reseniasgenero');
        $this->smarty->assign('admin', BASE_URL.'admin');
    }
      
    function mostrarResenias ($tablaresenia, $tablagenero){
        
        $this->smarty->assign('title', 'Reseñas');
        $this->smarty->assign('tablaresenia', $tablaresenia);
        $this->smarty->assign('tablagenero', $tablagenero); 
        $this->smarty->display('templates/home.tpl');
    }
    function mostrarGeneros ($tabla){
       
        $this->smarty->assign('title', 'Generos');
        $this->smarty->assign('tabla', $tabla);
        $this->smarty->display('templates/listaGeneros.tpl');
    }
    function mostrarReseniasporGenero($tabla){
        
        print_r($tabla);
    }

    function mostrarDetalle ($resenia, $tablagenero){
        
        $this->smarty->assign('title', 'Generos');
        $this->smarty->assign('resenia', $resenia);
        $this->smarty->assign('genero',$tablagenero[$resenia->id_genero]->nombre);  
        $this->smarty->display('templates/vistaResenia.tpl');
    }

    public function vistaLogin() {
    
        $this->smarty->assign('title', 'Login');
        $this->smarty->display('templates/login.tpl');
    }
    public function vistaAdmin($tablaresenia, $tablagenero) {
       
        $this->smarty->assign('title', 'Administrador');
        $this->smarty->assign('tablaresenia', $tablaresenia);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/admin.tpl');

    }

    public function vistaEditarResenia($id, $resenia, $tablagenero){
        
        $this->smarty->assign('title', 'Editar Reseña');
        $this->smarty->assign('resenia', $resenia);
        $this->smarty->assign('id',$id);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/editarResenia.tpl');
    }

    public function vistaEditarGenero($id, $tablagenero){
        $this->smarty->assign('title', 'Editar Genero');
        $this->smarty->assign('id',$id);
        $this->smarty->assign('tablagenero', $tablagenero);
        $this->smarty->display('templates/editarGenero.tpl');

    }
}
?>