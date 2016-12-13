<?php

require_once 'IControllerGeneral.php';

class IdiomaController implements IControllerGeneral {
    function Save($idioma) {
        $idiomaDAO = new IdiomaDAO();
        return $idiomaDAO->Save($idioma);
    }
      
    function Delete($idioma) {
        $idiomaDAO = new IdiomaDAO();
        return $idiomaDAO->Delete($idioma);
    }

    function ListAll(){
        $idiomaDAO = new IdiomaDAO();
        return $idiomaDAO->ListAll();
    }

    function getByCode($code){
        $idiomaDAO = new IdiomaDAO();
        return $idiomaDAO->getByCode($code);
    }
}
?> 
