<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new SalaController();
			$sala = new Sala();
			$sala->setDescricao($_POST["descricao"]);

            if($control->Save($sala)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../cadastroSala.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new SalaController();	
            $sala = new Sala();
            $sala->setCode($_GET["code"]);
			if($control->Delete($sala)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../cadastroSala.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../cadastroSala.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../paginaInicial.html';</script>";
		break;
	}	
?>