<?php
class Observacao{

private $code;
private $codeAluno;
private $descricao;

function __construct(){
    $this->setCode(0);
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function getCodeAluno(){
    return $this->codeAluno;
}

function setCodeAluno($codeAluno){
    $this->codeAluno = $codeAluno;
}

function setDescricao($descricao){
    $this->descricao = $descricao;
}

function getDescricao(){
    return $this->descricao;
}

}
?>