<?php

require_once 'IControllerGeneral.php';

class TipoContaController implements IControllerGeneral {
    function Save($tipoConta) {
        $tipoContaDAO = new TipoContaDAO();
        return $tipoContaDAO->Save($tipoConta);
    }
      
    function Delete($tipoConta) {
        $tipoContaDAO = new TipoContaDAO();
        return $tipoContaDAO->Delete($tipoConta);
    }

    function List(){
        $tipoContaDAO = new TipoContaDAO();
        return $tipoContaDAO->List();
    }
}
?> 
