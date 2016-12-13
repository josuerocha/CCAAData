<?PHP
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$pessoaControl = new PessoaController();
			$pessoa = new Pessoa();

			$enderecoControl = new EnderecoController();
			$endereco = new Endereco();

			$loginControl = new LoginController();
			$login = new Login();

			if(isset($_POST["inputNome"])){
				if(isset($_POST["codeHidden"])){
					$pessoa->setCode($_POST["codeHidden"]);
					
					if(isset($_POST["codeEndHidden"])){
						$pessoa->endereco->setCode($_POST["codeEndHidden"]);
					}
				}

			    $pessoa->setFKPerfil($_POST["perfil"]);
                $pessoa->setNome($_POST["inputNome"]);
                $pessoa->setCPF($_POST["cpf"]);
                $pessoa->setTelefone($_POST["inputTel"]);
                $pessoa->setCelular($_POST["inputCel"]);
                $pessoa->setEmail($_POST["email"]);
                $pessoa->setDataNascimento($_POST["dtNasc"]);
                $pessoa->setSexo($_POST["sexo"]);

                $endereco->setCep($_POST["cep"]);
                $endereco->setNumero($_POST["num"]);
                $endereco->setLogradouro($_POST["logradouro"]);
                $endereco->setComplemento($_POST["compl"]);
                $endereco->setBairro($_POST["bairro"]);
                $endereco->setCidade($_POST["cidade"]);
                $endereco->setUF($_POST["uf"]);

                $login->setEmail($_POST["email"]);
                $login->setSenha(MD5('unconfirmed'));

            }
            if($pessoaControl->Save($pessoa) && $loginControl->Save($login)){

            	$endereco->setCodePessoa($pessoa->getCode());
            	if($enderecoControl->Save($endereco)){

				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
				}
				else{
					echo "<script>alert('Erro ao salvar endereço!');</script>";
				}
			}

			else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>";
			}						
			echo "<script>location.href='../pages/cadastro_pessoa.php';</script>";
		break;	

		case 'horaAula':
			$pessoa = new Pessoa();
			$control = new PessoaController();

			$codProfessor = $_POST['prof'];
			$valor = $_POST['valor'];

			$pessoa = $control->ListByID($codProfessor);
			echo $pessoa->getNome();
			$pessoa->setHoraAula($valor);

			if($control->Save($pessoa)){		
			echo "<script>alert('Registro salvo com sucesso!');location.href='../pages/alterar_hora_aula.php';</script>"; 
			}else{		
			echo "<script>alert('Erro ao salvar o registro.');location.href='../pages/alterar_hora_aula.php';</script>"; 
			}	

			break;
		case 'edit':
			$control = new PessoaController();	
        	$pessoa = $control->getByCode($_POST["codeEdit"]);
            
			$array = $pessoa->toArray();

			echo  json_encode($array);

		break;

		case 'delete':
			$control = new PessoaController();

			$pessoa = $control->getByCode($_POST["codeDelete"]);		
			if($control->Delete($pessoa)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}
			echo "<script>location.href='../pages/cadastro_pessoa.php';</script>";						
		break;			
		
		default:
		   echo "<script> location.href='../cadastro_pessoa.php';</script>";
		break;
	}	




?>