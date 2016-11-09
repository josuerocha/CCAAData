<?php
class Pagamento{

private $code;
private $numeroCartao;
private $dtVencimento;
private $nome;
private $codSeguranca;
private $tipoDocumento;
private $documento;
private $telefone;
private $dtNascimento;
private $nomeDaMae;
private $ddd;

function __construct(){
    $this->setCode(0);
}

function getCode(){
    return $this->code;
}

function setCode($code){
    $this->code = $code;
}

function setNumeroCartao($numeroCartao){
    $this->numeroCartao = $numeroCartao;
}

function getNumeroCartao(){
    return $this->numeroCartao;
}

function setDtVencimento($dtVencimento){
    $this->dtVencimento = $dtVencimento;
}

function getDtVencimento(){
    return $this->dtVencimento;
}

function setCodSeguranca($codSeguranca){
    $this->codSeguranca = $codSeguranca;
}


function getCodSeguranca(){
    return $this->codSeguranca;
}


function setNome($nome){
    $this->nome = $nome;
}

function getNome(){
    return $this->nome;
}

function setTipoDocumento($tipoDocumento){
    $this->tipoDocumento = $tipoDocumento;
}

function getTipoDocumento(){
    return $this->tipoDocumento;
}

function setDocumento($documento){
    $this->documento = $documento;
}

function getDocumento(){
    return $this->documento;
}

function setTelefone($telefone){
    $this->telefone = $telefone;
}

function getTelefone(){
    return $this->telefone;
}

function setDtNascimento($dtNascimento){
    $this->dtNascimento = $dtNascimento;
}

function getDtNascimento(){
    return $this->dtNascimento;
}

function setNomeMae($nomeDaMae){
    $this->nomeDaMae = $nomeDaMae;
}

function getNomeMae(){
    return $this->nomeDaMae;
}

function setDDD($ddd){
    $this->ddd = $ddd;
}

function getDDD(){
    return $this->ddd;
}

}
?>