<?php

require_once 'IControllerGeneral.php';

class NotaController implements IControllerGeneral {
    function Save($nota) {
        $notaDAO = new NotaDAO();

        if($nota->getMid() >= 60 & $nota->getFinal() >= 60 & $nota->getOral() >= 60){
            $nota->setSituacao("Aprovado");
        }
        else if($nota->getMid() == "" | $nota->getFinal() == "" | $nota->getOral() == ""){
            $nota->setSituacao("Cursando");
            if($nota->getMid() == ""){
                $nota->setMid(NULL);
            }
            if($nota->getFinal() == ""){
                $nota->setFinal(NULL);
            }
            if($nota->setOral() == ""){
                $nota->setOral(NULL);
            }
        }
        else{
            $nota->setSituacao("Reprovado");
        }

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
