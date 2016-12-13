<?php
class Idioma{

	private $code;
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

	function setDescricao($descricao){
	    $this->descricao = $descricao;
	}

	function getDescricao(){
	    return $this->descricao;
	}

}
?>