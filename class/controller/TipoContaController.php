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

    function ListAll(){
        $tipoContaDAO = new TipoContaDAO();
        return $tipoContaDAO->ListAll();
    }

    function getByCode($code){
        $tipoContaDAO = new TipoContaDAO();
        return $tipoContaDAO->getByCode($code);
    }
}
?> 
