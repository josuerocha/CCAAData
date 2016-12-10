<?php

require_once 'IControllerGeneral.php';

class PresencaController implements IControllerGeneral {
    function Save($presenca) {
        $presencaDAO = new PresencaDAO();
        return $presencaDAO->Save($presenca);
    }
      
    function Delete($presencaProfessor) {
        $presencaDAO = new PresencaDAO();
        return $presencaDAO->Delete($presenca);
    }

    function ListAll(){
        $presencaDAO = new PresencaDAO();
        return $presencaDAO->ListAll();
    }

    function ListByPessoa($code){
        $presencaDAO = new PresencaDAO();
        return $presencaDAO->ListByPessoa($code);
    }
}
?> 
