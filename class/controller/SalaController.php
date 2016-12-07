<?php

require_once 'IControllerGeneral.php';

class SalaController implements IControllerGeneral {
    function Save($sala) {
        $salaDAO = new SalaDAO();
        return $salaDAO->Save($sala);
    }
      
    function Delete($sala) {
        $salaDAO = new SalaDAO();
        return $salaDAO->Delete($sala);
    }

    function ListAll(){
        $salaDAO = new SalaDAO();
        return $salaDAO->ListAll();
    }

    function getByCode($code){
        $salaDAO = new SalaDAO();
        return $salaDAO->getByCode($code);
    }    
}
?> 
