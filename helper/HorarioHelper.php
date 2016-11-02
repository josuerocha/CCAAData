<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new HorarioController();
			$horario = new Horario();
			
			$horario->setHorarioInicial($_POST["tempoinicial"]);
            $horario->setHorarioFinal($_POST["tempofinal"]);
            echo getdate();
            $horario->setData(getdate());


            if($control->Save($horario)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../Principal/altera_horario_escola.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new HorarioController();	
            $horario = new Horario();
            $horario->setCode($_GET["code"]);
			if($control->Delete($horario)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../Principal/cadastroTipoConta.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../Principal/altera_horario_escola.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../Principal/inicio.php';</script>";
		break;
	}	
?>