<?php
class Observacao{

	private $code;
	private $codeAluno;
	private $enviado;
	private $descricao;

	function __construct(){
	    $this->setCode(0);
	    $this->setEnviado(0);
	}

	function getCode(){
	    return $this->code;
	}

	function setCode($code){
	    $this->code = $code;
	}

	function getCodeAluno(){
	    return $this->codeAluno;
	}

	function setCodeAluno($codeAluno){
	    $this->codeAluno = $codeAluno;
	}

	function setEnviado($enviado){
	    $this->enviado = $enviado;
	}

	function getEnviado(){
	    return $this->enviado;
	}

	function setDescricao($descricao){
	    $this->descricao = $descricao;
	}

	function getDescricao(){
	    return $this->descricao;
	}

	function DisplayEnviado(){

		if($this->getEnviado()){
		  	return "<td><img src=\"assets/images/checkmark.png\" alt=\"Presente\" ></td>";

	  	}

	    else{
	  	 	return "<td><img src=\"assets/images/xmark.png\" alt=\"Ausente\" ></td>";
	  	}
	}

	function toArray(){
		return array(
	        'code' => $this->getCode(),
	        'codeAluno' => $this->getCodeAluno(),
	        'descricao' => $this->getDescricao()
    	);

	}
}
?>