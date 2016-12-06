<?php
class Nota{

private $code;
private $codeAluno;
private $disciplina;
private $mid;
private $final;
private $oral;
private $ano;
private $semestre;
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

function setCodeAluno($codeAluno){
    $this->codeAluno = $codeAluno;
}

function getCodeAluno(){
    return $this->codeAluno;
}

function setDisciplina($disciplina){
    $this->disciplina = $disciplina;
}

function getDisciplina(){
    return $this->disciplina;
}

function setMid($mid){
    $this->mid = $mid;
}

function getMid(){
    return $this->mid;
}

function setFinal($final){
    $this->final = $final;
}

function getFinal(){
    return $this->final;
}

function setOral($oral){
    $this->oral = $oral;
}

function getOral(){
    return $this->oral;
}

function setAno($ano){
    $this->ano = $ano;
}

function getAno(){
    return $this->ano;
}

function setSemestre($semestre){
    $this->semestre = $semestre;
}

function getSemestre(){
    return $this->semestre;
}

function setSituacao($situacao){
    $this->situacao = $situacao;
}

function getSituacao(){
    return $this->situacao;
}

}
?>