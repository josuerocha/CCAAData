<?php

require_once 'IControllerGeneral.php';

class PresencaProfessorController implements IControllerGeneral {
    function Save($presencaProfessor) {
        $presencaProfessorDAO = new PresencaProfessorDAO();
        return $presencaProfessorDAO->Save($presencaProfessor);
    }
      
    function Delete($presencaProfessor) {
        $presencaProfessorDAO = new PresencaProfessorDAO();
        return $presencaProfessorDAO->Delete($presencaProfessor);
    }

    function ListAll(){
        $presencaProfessorDAO = new PresencaProfessorDAO();
        return $presencaProfessorDAO->ListAll();
    }

    function ListByProfessor($code){
        $presencaProfessorDAO = new PresencaProfessorDAO();
        return $presencaProfessorDAO->ListByProfessor($code);
    }
}
?> 
