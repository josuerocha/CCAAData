<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new SalaController();
			$sala = new Sala();
			$sala->setCode($_POST["numero"]);
			$sala->setDescricao("Padrão");

            if($control->Save($sala)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/cadastro_sala.php';</script>"; 			
			
		break;
		case 'edit':
			$control = new SalaController();	
            $sala = $control->getByCode($_POST["code"]);
            
			$array = $sala->toArray();

			echo "{\"code\":3,\"numero\":3}"; //json_encode($array);
		break;	

		case 'delete':
			$control = new SalaController();	
            $sala = new Sala();
            $sala->setCode($_POST["code"]);
			if($control->Delete($sala)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}
			echo "<script> location.href='../pages/cadastro_sala.php';</script>";						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html';</script>";
		break;
	}	
?>