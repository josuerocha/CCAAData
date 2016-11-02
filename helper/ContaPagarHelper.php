<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new ContaPagarController();
			$contaPagar = new ContaPagar();
			
			$contaPagar->setTipo($_POST["tipo_conta"]);
            $contaPagar->setValor($_POST["valor"]);
            $contaPagar->setDtVencimento($_POST["Dt_venc"]);
            $contaPagar->setDtPagamento($_POST["Dt_pag"]);
            $contaPagar->setSituacao($_POST["Situacao"]);

            if($control->Save($contaPagar)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../Principal/ContasAPagar.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new ContaPagarController();	
            $contaPagar = new ContaPagar();
            $contaPagar->setCode($_GET["code"]);
			if($control->Delete($contaPagar)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../Principal/ContasAReceber.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../Principal/ContasAReceber.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../Principal/indice.html';</script>";
		break;
	}	
?>