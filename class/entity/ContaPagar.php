<?php
class ContaPagar{
private $code;
private $tipo;
private $valor;
private $dtVencimento;
private $dtPagamento;
private $situacao;

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

function setValor($valor){
    $this->valor = $valor;
}

function getValor(){
    return $this->valor;
}

function setDtVencimento($dtVencimento){
    $this->dtVencimento = $dtVencimento;
}

function getDtVencimento(){
    return $this->dtVencimento;
}

function setDtPagamento($dtPagamento){
    $this->dtPagamento = $dtPagamento;
}

function getDtPagamento(){
    return $this->dtPagamento;
}

function setSituacao($situacao){
    $this->situacao = $situacao;
}

function getSituacao(){
    return $this->situacao;
}

function toArray(){
    return array(
        'code'=>$this->getCode(),
        'tipo'=>$this->getFKTipo(),
        'valor'=>$this->getValor(),
        'dtVencimento'=>$this->getDtVencimento(),
        'dtPagamento'=>$this->getDtPagamento(),
        'situacao'=>$this->getSituacao()
    );
}


}
?>