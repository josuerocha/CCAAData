<?php

require_once 'IControllerGeneral.php';

class TurmaController implements IControllerGeneral {
    function Save($turma) {
        $turmaDAO = new TurmaDAO();
        return $turmaDAO->Save($turma);
    }
      
    function Delete($turma) {
        $turmaDAO = new TurmaDAO();
        return $turmaDAO->Delete($turma);
    }

    function List(){
        $turmaDAO = new TurmaDAO();
        return $turmaDAO->List();
    }
}
?> 
