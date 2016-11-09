<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new TipoContaController();
			$tipoConta = new TipoConta();
			
			$tipoConta->setTipo($_POST["contatipo"]);

            if($control->Save($tipoConta)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}
			ReloadList();			
		break;	

		case 'delete':
			$control = new TipoContaController();	
            $tipoConta = new Sala();
            $tipoConta->setCode($_POST["deleteCode"]);
			if($control->Delete($tipoConta)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}						
			ReloadList();
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../Principal/paginaInicial.html';</script>";
		break;
	}

	function ReloadList(){
		?>
		<table id="listaContas">
		<tr>
			<th id="gridCodigo">Código</th>
			<th id="gridConta">Conta</th>
			<th colspan="2" id="gridAcao">Ação</th>
		</tr>
			<?PHP
		require_once ("../util/autoload.php");
		spl_autoload_register("LoadClass");
		$controller = new TipoContaController();
		$tipoContas = $controller->List();
		while($tipoConta=array_pop($tipoContas)){
		echo "
		<tr>
		<th id='gridCodigo'>{$tipoConta->getCode()}</th>
		<th id='gridCodigo'>{$tipoConta->getTipo()}</th>
		<th>
			<form action=\"../helper/TipoContaHelper.php?action=delete&code={$tipoConta->getCode()}\" method=\"post\">
			<input type=\"submit\" value=\"Excluir\">
			</form>
		</th>
		</tr>
		";
		}

	}	
?>