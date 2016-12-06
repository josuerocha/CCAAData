<?PHP
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new PessoaController();
			$pessoa = new Pessoa();

			if(isset($_POST["inputNome"])){
			    $pessoa->setFKPerfil($_POST["perfil"]);
                $pessoa->setNome($_POST["inputNome"]);
                $pessoa->setCPF($_POST["cpf"]);
                $pessoa->setEndereco($_POST["num"]." ".$_POST["logradouro"].$_POST["compl"]);
                $pessoa->setTelefone($_POST["inputTel"]);
                $pessoa->setCelular($_POST["inputCel"]);
                $pessoa->setEmail($_POST["email"]);
                $pessoa->setDataNascimento($_POST["dtNasc"]);
                $pessoa->setSexo($_POST["sexo"]);
            }
            if($control->Save($pessoa)){		
				echo "<script>alert('Registro salvo com sucesso!');location.href='../pages/cadastro_pessoa.php';</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');location.href='../pages/cadastro_pessoa.php';</script>"; 
			}						
			
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
		case 'delete':
			$control = new PessoaController();

			$pessoa = $control->ListByCode($_GET["code"]);		
			if($control->Delete($pessoa)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}
			echo "<script>location.href='../pages/cadastro_pessoa.php';</script>";						
		break;			
		
		default:
		   echo "<script> location.href='../cadastroPessoas.php';</script>";
		break;
	}	




?>