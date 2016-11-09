<?php

require_once 'IControllerGeneral.php';

class HorarioController implements IControllerGeneral {
    function Save($horario) {
        $horarioDAO = new HorarioDAO();
        return $horarioDAO->Save($horario);
    }
      
    function Delete($perfil) {
        $horarioDAO = new HorarioDAO();
        return $horarioDAO->Delete($horario);
    }

    function List(){
        $horarioDAO = new HorarioDAO();
        return $horarioDAO->List();
    }
}
?> 
