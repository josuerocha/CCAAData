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

    function getByCode($code){
            $pessoaDAO = new PessoaDAO();
            return $pessoaDAO->getByCode($code);
    }

    function ListByPerfil($fkPerfil){
            $pessoaDAO = new PessoaDAO();
            return $pessoaDAO->ListByPerfil($fkPerfil);
    }

    function getByEmail($email){
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->getByEmail($email);
    }    
}

?>
