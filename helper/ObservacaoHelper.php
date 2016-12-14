<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new ObservacaoController();
			$observacao = new Observacao();
			
            if(isset($_POST["code"])){
                $observacao->setCode($_POST["code"]);
            }

            $observacao->setCodeAluno($_POST['codeAluno']);
			$observacao->setDescricao($_POST["descricao"]);

            if($control->Save($observacao)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/entrada_diario.php';</script>"; 			
			
		break;	

		case 'edit':
			
			$control = new ObservacaoController();	
            $observacao = $control->getByCode($_POST['codeEdit']);
            
			$array = $observacao->toArray();

			echo  json_encode($array);

		break;

		case 'delete':
			$control = new ObservacaoController();
			$observacao = new Observacao();
            $observacao->setCode($_POST["codeDelete"]);
			if($control->Delete($observacao)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}						
			echo "<script>location.href='../pages/entrada_diario.php'</script>";
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/login.html';</script>";
		break;
	}	
?>