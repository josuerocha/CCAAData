<?php
class Login{

private $email;
private $senha;


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

}
?>