<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new IdiomaController();
			$idioma = new Idioma();
			
			if(isset($_POST['codeHidden'])){
				$idioma->setCode($_POST['codeHidden']);
			}

			$idioma->setDescricao($_POST["descricao"]);

            if($control->Save($idioma)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/cadastro_idioma.php';</script>"; 			
			
		break;	

		case 'edit':

			$control = new IdiomaController();	
            $idioma = $control->getByCode($_POST["codeEdit"]);

			$array = $idioma->toArray();
			echo  json_encode($array);

		break;

		case 'delete':
			$control = new IdiomaController();	
            $idioma = new Sala();
            $idioma->setCode($_POST["codeDelete"]);
			
			if($control->Delete($idioma)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}

			else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}			

			echo "<script>location.href='../pages/cadastro_idioma.php';</script>";

		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html';</script>";
		break;
	}	
?>