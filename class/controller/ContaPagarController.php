<?php

require_once 'IControllerGeneral.php';

class ContaPagarController implements IControllerGeneral {
    function Save($contaPagar) {
        $contaPagarDAO = new ContaPagarDAO();
        return $contaPagarDAO->Save($contaPagar);
    }
      
    function Delete($contaPagar) {
        $contaPagarDAO = new ContaPagarDAO();
        return $contaPagarDAO->Delete($contaPagar);
    }

    function List(){
        $contaPagarDAO = new ContaPagarDAO();
        return $contaPagarDAO->List();
    }
}
?> 
