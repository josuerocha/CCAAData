<?php
require_once "../../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new IdiomaController();
			$idioma = new Idioma();
			
			$idioma->setDescricao($_POST["descricao"]);

            if($control->Save($idioma)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../cadastroIdioma.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new IdiomaController();	
            $idioma = new Sala();
            $idioma->setCode($_GET["code"]);
			if($control->Delete($idioma)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../cadastroIdioma.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../cadastroIdioma.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../paginaInicial.html';</script>";
		break;
	}	
?>