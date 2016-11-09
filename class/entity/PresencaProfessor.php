<?php
class PresencaProfessor{

private $code;
private $codePessoa;
private $situacao;
private $data;

function __construct(){
    $this->setCode(0);
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function setCodePessoa($codePessoa){
    $this->codePessoa = $codePessoa;
}

function getCodePessoa(){
    return $this->codePessoa;
}

function setData($data){
    $this->data = $data;
}

function getData(){
    return $this->data;
}

function setSituacao($situacao){
    $this->situacao = $situacao;
}

function getSituacao(){
    return $this->situacao;
}

}
?>