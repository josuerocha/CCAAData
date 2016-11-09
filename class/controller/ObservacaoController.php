<?php

require_once 'IControllerGeneral.php';

class ObservacaoController implements IControllerGeneral {
    function Save($observacao) {
        $observacaoDAO = new ObservacaoDAO();
        return $observacaoDAO->Save($observacao);
    }
      
    function Delete($observacao) {
        $observacaoDAO = new ObservacaoDAO();
        return $observacaoDAO->Delete($observacao);
    }

    function List(){
        $observacaoDAO = new ObservacaoDAO();
        return $observacaoDAO->List();
    }
}
?> 