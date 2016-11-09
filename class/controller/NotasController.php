<?php

require_once 'IControllerGeneral.php';

class NotasController implements IControllerGeneral {
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
}
?> 
