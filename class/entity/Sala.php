<?php
class Sala{

private $code;
private $numero;
private $descricao;

function __construct(){
    $this->setCode(0);
    $this->setNumero(0);
    $this->setDescricao("empty");
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function getNumero(){
    return $this->numero;
}

function setNumero($numero){
    $this->numero = $numero;
}

function setDescricao($descricao){
    $this->descricao = $descricao;
}

function getDescricao(){
    return $this->descricao;
}

function toArray(){
    return array(
        'code' => $this->getCode(),
        'numero' => $this->getNumero()
        //'descricao' => "{$this->getDescricao()}"
    );
}

}
?>