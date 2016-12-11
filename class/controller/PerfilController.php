<?php

require_once 'IControllerGeneral.php';

class PerfilController implements IControllerGeneral {
    function Save($perfil) {
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->Save($perfil);
    }
      
    function Delete($perfil) {
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->Delete($perfil);
    }

    function ListAll(){
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->ListAll();
    }

    function GetByCode($code){
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->GetByCode($code);
    }

    function getByDescricao($descricao){
        $perfilDAO = new PerfilDAO();
        return $perfilDAO->getByDescricao($descricao);
    }
}
?> 
