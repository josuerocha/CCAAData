<?php

require_once 'IControllerLogin.php';

class LoginController implements IControllerLogin {
    function Save($login) {
        $loginDAO = new LoginDAO();
        return $loginDAO->Save($login);
    }

    function Update($login){
        $loginDAO = new LoginDAO();
        return $loginDAO->Update($login);
    }
      
    function Delete($login) {
        $loginDAO = new LoginDAO();
        return $loginDAO->Delete($login);
    }

    function Validate($email, $senha) {
        $loginDAO = new LoginDAO();
        return $loginDAO->Validate($email, $senha);
    }

    function ChangePassword($email, $novaSenha) {
        $loginDAO = new LoginDAO();
        return $loginDAO->alterarSenha($email, $novaSenha);
    }

    function getPessoa($email){
        $loginDAO = new LoginDAO();
        return $loginDAO->getPessoa($email);
    }

    function getByEmail($email){
        $loginDAO = new LoginDAO();
        return $loginDAO->getByEmail($email);
    }

    function ListAll(){
        $loginDAO = new LoginDAO();
        return $loginDAO->ListAll();
    }
}
?> 