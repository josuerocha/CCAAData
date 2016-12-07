<?php

require_once 'IControllerGeneral.php';

class EnderecoController implements IControllerGeneral {
    function Save($endereco) {
        $enderecoDAO = new EnderecoDAO();
        return $enderecoDAO->Save($endereco);
    }
      
    function Delete($endereco) {
        $enderecoDAO = new EnderecoDAO();
        return $enderecoDAO->Delete($endereco);
    }

    function ListAll(){
        $enderecoDAO = new EnderecoDAO();
        return $enderecoDAO->ListAll();
    }

    function getByCode($code){
        $enderecoDAO = new EnderecoDAO();
        return $enderecoDAO->getByCode($code);
    }

    function getByPessoa($codePessoa){
        $enderecoDAO = new EnderecoDAO();
        return $enderecoDAO->getByPessoa($codePessoa);
    }
}
?> 
