<?php

require_once 'IControllerGeneral.php';

class PessoaController implements IControllerGeneral{

    function Save($pessoa){
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->Save($pessoa);
    }

    function Delete($pessoa){
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->Delete($pessoa);
    }

    function ListAll(){
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->ListAll();
    }

    function ListByCode($code){
            $pessoaDAO = new PessoaDAO();
            return $pessoaDAO->ListByCode($code);
    }

    function ListByPerfil($fkPerfil){
            $pessoaDAO = new PessoaDAO();
            return $pessoaDAO->ListByPerfil($fkPerfil);
    }    
}

?>
