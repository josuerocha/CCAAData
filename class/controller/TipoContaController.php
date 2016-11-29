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
        return $tipoContaDAO->List();
    }

    function ListByCode($code){
        $tipoContaDAO = new TipoContaDAO();
        return $tipoContaDAO->ListByCode($code);
    }
}
?> 
