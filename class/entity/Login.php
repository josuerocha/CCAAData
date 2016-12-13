<?php
class Login{

    private $email;
    private $senha;
    private $isConfirmed;
    private $chaveConfirmacao;


    function __construct(){
        $this->setEmail('');
        $this->setSenha('');
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getSenha(){
        return $this->senha;
    }

    function setSenha($senha){
        $this->senha = $senha;
    }

    function getIsConfirmed(){
        return $this->isConfirmed;
    }

    function setIsConfirmed($isConfirmed){
        $this->isConfirmed = $isConfirmed;
    }

    function getChaveConfirmacao(){
        return $this->chaveConfirmacao;
    }

    function setChaveConfirmacao($chaveConfirmacao){
        $this->chaveConfirmacao = $chaveConfirmacao;
    }

}
?>