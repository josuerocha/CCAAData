<?php
class Pessoa{
    private $code;
    private $fkPerfil;
    private $nome;
    private $cpf;
    private $telefone;
    private $celular;
    private $email;
    private $dataNascimento;
    private $sexo;
    private $horaAula;
    private $foto;
    public $endereco;

    function __construct(){
        $this->setCode(0);
        $this->nome = 0;
        $this->setHoraAula(0);
        $this->setFoto("noimg.png");
    }

    function getCode(){
        return $this->code;
    }

    function setCode($code){
        $this->code = $code;

        $enderecoControl = new EnderecoController();
        $this->endereco = $enderecoControl->getByPessoa($this->getCode());
    }

    function getFKPerfil(){
        return $this->fkPerfil;
    }

    function setFKPerfil($fkPerfil){
        $this->fkPerfil = $fkPerfil; 
    }

    function getNome(){
        return $this->nome;
    }

    function setNome($nome){
        $this->nome = $nome;
    }

    function getCPF(){
        return $this->cpf;
    }

    function setCPF($cpf){
        $this->cpf = $cpf;
    }

    function getTelefone(){
        return $this->telefone;
    }

    function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    function getCelular(){
        return $this->celular;
    }

    function setCelular($celular){
        $this->celular = $celular;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getDataNascimento(){
        return $this->dataNascimento;
    }

    function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    function getSexo(){
        return $this->sexo;
    }

    function setSexo($sexo){
        $this->sexo = $sexo;
    }

    function getHoraAula(){
        return $this->horaAula;
    }

    function setHoraAula($horaAula){
        $this->horaAula = $horaAula;
    }

    function getFoto(){
        return $this->foto;
    }

    function setFoto($foto){
        $this->foto = $foto;
    }

    function toArray(){

    if($this->endereco->getCep() !== null ){
    return array(
        'code' => $this->getCode(),
        'perfil' => $this->getFKPerfil(),
        'nome' => $this->getNome(),
        'cpf' => $this->getCPF(),
        'telefone' => $this->getTelefone(),
        'celular' => $this->getCelular(),
        'email' => $this->getEmail(),
        'dataNascimento' => $this->getDataNascimento(),
        'sexo' => $this->getSexo(),
        'horaAula' => $this->getHoraAula(),
        'foto' => $this->getFoto(),
        'codeEndereco' => $this->endereco->getCode(),
        'cep' => $this->endereco->getCep(),
        'logradouro' => $this->endereco->getLogradouro(),
        'numero' => $this->endereco->getNumero(),
        'complemento' => $this->endereco->getComplemento(),
        'bairro' => $this->endereco->getBairro(),
        'cidade' => $this->endereco->getCidade(),
        'uf' => $this->endereco->getUF()
    );

    }

    else{
        return array(
        'code' => $this->getCode(),
        'perfil' => $this->getFKPerfil(),
        'nome' => $this->getNome(),
        'cpf' => $this->getCPF(),
        'telefone' => $this->getTelefone(),
        'celular' => $this->getCelular(),
        'email' => $this->getEmail(),
        'dataNascimento' => $this->getDataNascimento(),
        'sexo' => $this->getSexo(),
        'horaAula' => $this->getHoraAula(),
        'foto' => $this->getFoto(),
        'codeEndereco' => "",
        'cep' => "",
        'logradouro' => "",
        'numero' => "",
        'complemento' => "",
        'bairro' => "",
        'cidade' => "",
        'uf' => ""
    );

    }
}
}
?>