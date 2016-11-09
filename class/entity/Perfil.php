<?php
class Perfil{

private $code;
private $descricao;


function __construct(){
    $this->setCode(0);
    $this->setDescricao('');
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function getDescricao(){
    return $this->descricao;
}

function setDescricao($descricao){
    $this->descricao = $descricao;
}

}
?>