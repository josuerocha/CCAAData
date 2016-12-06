<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
    case 'save':
		$control = new PresencaController();
		$horario = new Presenca();
		
		$horario->setHorarioInicial($_POST["tempoinicial"]);
	    $horario->setHorarioFinal($_POST["tempofinal"]);
	    echo getdate();
	    $horario->setData(getdate());


	    if($control->Save($horario)){		
			echo "<script>alert('Registro salvo com sucesso!');</script>"; 
		}else{		
			echo "<script>alert('Erro ao salvar o registro.');</script>"; 
		}			
		echo "<script>location.href='../pages/altera_horario_escola.php';</script>"; 			
			
	break;	
	default:
		echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.php';</script>";
	break;
	}	
?>