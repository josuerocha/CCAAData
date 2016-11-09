<?php
class TipoConta{

private $code;
private $tipo;

function __construct(){
    $this->setCode(0);
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function setTipo($tipo){
    $this->tipo = $tipo;
}

function getTipo(){
    return $this->tipo;
}

}
?>