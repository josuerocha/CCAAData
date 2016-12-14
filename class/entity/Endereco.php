<?php
class Endereco{
    private $code;
    private $codePessoa;
    private $cep;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;

    function __construct(){
        $this->setCode(0);
        $this->codePessoa = 0;
    }

    function getCode(){
        return $this->code;
    }

    function setCode($code){
        $this->code = $code;
    }

    function getCodePessoa(){
        return $this->codePessoa;
    }

    function setCodePessoa($codePessoa){
        $this->codePessoa = $codePessoa; 
    }

    function getCep(){
        return $this->cep;
    }

    function setCep($cep){
        $this->cep = $cep;
    }

    function getLogradouro(){
        return $this->logradouro;
    }

    function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    function getNumero(){
        return $this->numero;
    }

    function setNumero($numero){
        $this->numero = $numero;
    }

    function getComplemento(){
        return $this->complemento;
    }

    function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    function getBairro(){
        return $this->bairro;
    }

    function setBairro($bairro){
        $this->bairro = $bairro;
    }

    function getUF(){
        return $this->uf;
    }

    function setUF($uf){
        $this->uf = $uf;
    }

    function getCidade(){
        return $this->cidade;
    }

    function setCidade($cidade){
        $this->cidade = $cidade;
    }

    function getAll(){
        return "{$this->getLogradouro()}"." "."{$this->getNumero()}"." "."{$this->getComplemento()}".", <br>"."{$this->getCidade()}".", "."{$this->getUF()}".", "."{$this->getCep()}";
    }
}
?>