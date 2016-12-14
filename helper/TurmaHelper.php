<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new TurmaController();
            $turma = new Turma();


            if(isset($_POST['desc_turma'])){

            	if(isset($_POST['codeHidden'])){
            		$turma->setCode($_POST['codeHidden']);
            	}

	            $turma->setSala($_POST['select_sala']);
	            $turma->setIdioma($_POST['select_idioma']);
	            $turma->setDescricao($_POST['desc_turma']);
	            $turma->setHorario($_POST['horario_turma']);

	            if($control->Save($turma)){		
					echo "<script>alert('Registro salvo com sucesso!');</script>"; 
				}

				else{		
					echo "<script>alert('Erro ao salvar o registro.');</script>"; 
				}			
			}

			else{		
					echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}	
			echo "<script>location.href='../pages/cadastro_turma.php';</script>"; 			
			
		break;

		case 'edit':
			$control = new TurmaController();	
            $turma = $control->getByCode($_POST["codeEdit"]);

			$array = $turma->toArray();
			echo  json_encode($array);

		break;

		case 'delete':
			$control = new TurmaController();	
            $turma = new Turma();
            $turma->setCode($_POST["codeDelete"]);
			
			if($control->Delete($turma)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}

			else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}			
			echo "<script>location.href='../pages/cadastro_turma.php';</script>"; 			
		break;

		default:
			echo "<script>alert('Acesso negado!');</script>";
		break;
	}	
?>