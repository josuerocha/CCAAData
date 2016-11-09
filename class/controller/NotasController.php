<?php

require_once 'IControllerGeneral.php';

class NotaController implements IControllerGeneral {
    function Save($nota) {
        $notaDAO = new NotaDAO();
        return $notaDAO->Save($nota);
    }
      
    function Delete($nota) {
        $notaDAO = new NotaDAO();
        return $notaDAO->Delete($nota);
    }

    function List(){
        $notaDAO = new NotaDAO();
        return $notaDAO->List();
    }

    function ListById($code){
        $notaDAO = new NotaDAO();
        return $notaDAO->ListById($code);
    }

    function ListByAluno($codeAluno){
        $notaDAO = new NotaDAO();
        return $notaDAO->ListByAluno($codeAluno);
    }
}
?> 
