<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new PresencaProfessorController();
			$presenca = new PresencaProfessor();
			
            if(isset($_POST["code"])){
			$presenca->setCode($_POST["code"]);
            }
            $presenca->setCodePessoa($_POST["sltProf"]);
            if ($_POST["situacao"]=="on"){
                $presenca->setSituacao(1);
            }
            $presenca->setData($_POST["data"]);
            
            if($control->Save($presenca)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/controle_presenca_professor.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new PresencaProfessorController();	
            $presenca = new PresencaProfessor();
            $presenca->setCode($_POST["deleteCode"]);
			if($control->Delete($presenca)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');;</script>"; 
			}
            echo "<script>location.href='../pages/controle_presenca_professor.php';</script>"; 				
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../paginaInicial.html';</script>";
		break;
	}	
?>