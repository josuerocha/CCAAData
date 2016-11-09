<?php
class Horario{

private $code;
private $horarioInicial;
private $horarioFinal;
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

function getHorarioInicial(){
    return $this->horarioInicial;
}

function setHorarioInicial($horarioInicial){
    $this->horarioInicial = $horarioInicial;
}

function getHorarioFinal(){
    return $this->horarioFinal;
}

function setHorarioFinal($horarioFinal){
    $this->horarioFinal = $horarioFinal;
}

function getData(){
    return $this->data;
}

function setData($data){
    $this->data = $data;
}

}
?>