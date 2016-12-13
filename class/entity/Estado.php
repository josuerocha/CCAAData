<?PHP
class Estado{

	private $code;
	private $nome;
	private $sigla;

	function __construct(){
	    $this->setCode(0);
	}

	function getCode(){
	    return $this->code;
	}

	function setCode($code){
	    $this->code = $code;
	}

	function setNome($nome){
	    $this->nome = $nome;
	}

	function getNome(){
	    return $this->nome;
	}

	function setSigla($sigla){
	    $this->sigla = $sigla;
	}

	function getSigla(){
	    return $this->sigla;
	}

}
?>