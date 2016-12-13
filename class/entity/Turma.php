<?php
class Turma{

    private $code;
    private $sala;
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

    function setSala($sala){
        $this->sala = $sala;
    }

    function getSala(){
        return $this->sala;
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

    function toArray(){
        return array(
            'code' => $this->getCode(),
            'sala' => $this->getSala(),
            'idioma' => $this->getIdioma(),
            'descricao' => $this->getDescricao(),
            'horario' => $this->getHorario()
        );
}

}
?>