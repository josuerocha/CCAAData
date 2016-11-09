<?php
class Turma{

private $code;
private $numeroSala;
private $idioma;
private $descricao;
private $horario;

function __construct(){
    $this->setCode(0);
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function setNumeroSala($numeroSala){
    $this->numeroSala = $numeroSala;
}

function getNumeroSala(){
    return $this->numeroSala;
}

function setIdioma($idioma){
    $this->idioma = $idioma;
}

function getIdioma(){
    return $this->idioma;
}

function setDescricao($descricao){
    $this->descricao = $descricao;
}

function getDescricao(){
    return $this->descricao;
}

function setHorario($horario){
    $this->horario = $horario;
}

function getHorario(){
    return $this->horario;
}

}
?>