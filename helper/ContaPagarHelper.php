<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new ContaPagarController();
			$contaPagar = new ContaPagar();
			
			if(isset($_POST['codeHidden'])){
				$contaPagar->setCode($_POST['codeHidden']);
			}
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
			echo "<script>location.href='../pages/contas_pagar.php';</script>"; 			
			
		break;	
		case 'edit':
			$control = new ContaPagarController();	
            $contaPagar = new ContaPagar();
            $contaPagar = $control->ListById($_POST["codeEdit"]);
			//var_dump ($contaPagar->toArray());
			$array = $contaPagar->toArray();
			echo  json_encode($array);

		break;

		case 'delete':
			$control = new ContaPagarController();	
            $contaPagar = new ContaPagar();
            $contaPagar->setCode($_GET["code"]);
			if($control->Delete($contaPagar)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}			
			echo "<script>location.href='../pages/contas_pagar.php';</script>"; 			
		break;			
		default:
			echo "<script>alert('Acesso negado!');</script>";
		break;
	}	
?>