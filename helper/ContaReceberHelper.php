<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
		case 'save':
			$control = new ContaReceberController();
			$contaReceber = new ContaReceber();

			if(isset($_POST["codeHidden"])){
				$contaReceber->setCode($_POST["codeHidden"]);
			}
			$contaReceber->setTipo($_POST["tipo_conta"]);
            $contaReceber->setValor($_POST["valor"]);
            $contaReceber->setDtVencimento($_POST["Dt_venc"]);
            $contaReceber->setDtPagamento($_POST["Dt_pag"]);
            $contaReceber->setSituacao($_POST["Situacao"]);

            if($control->Save($contaReceber)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../Principal/contas_receber.php';</script>"; 			
			
		break;	

		case 'edit':
			$control = new ContaReceberController();
			$contaReceber = new ContaReceber();
            $contaReceber = $control->ListById($_POST["codeEdit"]);
			//var_dump ($contaPagar->toArray());
			$array = $contaReceber->toArray();
			echo  json_encode($array);

		break;

		case 'delete':
			$control = new ContaReceberController();	
            $contaReceber = new ContaReceber();
            $contaReceber->setCode($_GET["code"]);
			if($control->Delete($contaReceber)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../Principal/contas_receber.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../Principal/contas_receber.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../Principal/indice.html';</script>";
		break;
	}	
?>