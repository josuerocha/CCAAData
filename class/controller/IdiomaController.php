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

    function List(){
        $idiomaDAO = new IdiomaDAO();
        return $idiomaDAO->List();
    }
}
?> 
