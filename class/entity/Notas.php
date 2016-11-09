<?php
class TipoConta{

private $code;
private $codeAluno;
private $mid;
private $final;
private $oral;
private $ano;
private $semestre;

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

}
?>
cod_Notas` INT NOT NULL,
  `cod_Aluno` INT NULL,
  `mid_Aluno` FLOAT NULL,
  `final_Aluno` FLOAT NULL,
  `oral_Aluno` FLOAT NULL,
  `ano_Aluno` INT NULL,
  `semestre_Aluno` INT NULL,