<?php

require_once 'IControllerGeneral.php';

class ContaReceberController implements IControllerGeneral {
    function Save($contaReceber) {
        $contaReceberDAO = new ContaReceberDAO();
        return $contaReceberDAO->Save($contaReceber);
    }
      
    function Delete($contaReceber) {
        $contaReceberDAO = new ContaReceberDAO();
        return $contaReceberDAO->Delete($contaReceber);
    }

    function ListAll(){
        $contaReceberDAO = new ContaReceberDAO();
        return $contaReceberDAO->ListAll();
    }

    function ListById($code){
        $contaReceberDAO = new ContaReceberDAO();
        return $contaReceberDAO->ListById($code);

    }
}
?> 
