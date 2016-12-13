<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new PerfilController();
			$perfil = new Perfil();
			
			if(isset($_POST["codeHidden"])){
				$perfil->setCode($_POST["codeHidden"]);
			}

			$perfil->setDescricao($_POST["descricao"]);
			$perfil->setRegistration($_POST["cadastro"]);
			$perfil->setComplexRegistration($_POST["cadastro_complexo"]);
			$perfil->setReport($_POST["relatorio"]);
			$perfil->setComplexReport($_POST["relatorio_complexo"]);
			$perfil->setStudy($_POST["estudante"]);
			$perfil->setTeach($_POST["professor"]);

            if($control->Save($perfil)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/cadastro_perfil.php';</script>"; 			
			
		break;
		case 'edit':
			$control = new PerfilController();	
            $perfil = $control->getByCode($_POST["codeEdit"]);
            
			$array = $perfil->toArray();

			echo  json_encode($array);
		break;	

		case 'delete':
			$control = new PerfilController();	
            $perfil = new Perfil();
            $perfil->setCode($_POST["codeDelete"]);
			if($control->Delete($perfil)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}
			echo "<script> location.href='../pages/cadastro_perfil.php';</script>";						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html';</script>";
		break;
	}	
?>