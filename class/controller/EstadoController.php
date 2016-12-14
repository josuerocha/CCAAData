<?php

require_once 'IControllerGeneral.php';

class EstadoController implements IControllerGeneral {
    
    function Save($estado) {
        $estadoDAO = new EstadoDAO();
        return $estadoDAO->Save($estado);
    }
      
    function Delete($estado) {
        echo "<script> alert('OI'); </script>";
        $estadoDAO = new EstadoDAO();
        return $estadoDAO->Delete($estado);
    }

    function ListAll(){
        $estadoDAO = new EstadoDAO();
        return $estadoDAO->ListAll();
    }

}
?> 
